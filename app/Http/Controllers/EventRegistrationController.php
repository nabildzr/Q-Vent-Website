<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Attendee;
use App\Models\User;
use App\Models\EventRegistrationLink;
use App\Models\CustomInputRegistration;
use App\Models\CustomInputRegistrationValue;
use App\Models\DefaultInputRegistrationStatus;
use App\Models\QRCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;

class EventRegistrationController extends Controller
{
    /**
     * Menampilkan form registrasi ke peserta.
     */
    public function showForm($link)
    {

        $registrationLink = EventRegistrationLink::where('link', $link)
            ->where('status', 'open')
            ->where('valid_until', '>=', now())
            ->firstOrFail();

        $event = $registrationLink->event;

        $defaultConfig = DefaultInputRegistrationStatus::where('event_id', $event->id)->first();
        $documentLabel = 'Dokumen Tambahan';

        // cari dari custom input (label override)
        $overrideInput = CustomInputRegistration::where('event_id', $event->id)
            ->where('name', 'input_document')
            ->where('type', 'file')
            ->where('status', true)
            ->first();

        if ($overrideInput) {
            $documentLabel = $overrideInput->label;
        }

        $defaultInputs = [];

        if ($defaultConfig) {
            // Gabung label kalau cuma salah satu yang aktif
            $nameCombined = collect([
                $defaultConfig->input_first_name,
                $defaultConfig->input_last_name
            ])->filter()->count() === 1;

            if ($defaultConfig->input_first_name) {
                $defaultInputs[] = [
                    'label' => $nameCombined ? 'Nama' : 'Nama Depan',
                    'name' => 'first_name',
                    'type' => 'text',
                    'required' => true
                ];
            }

            if ($defaultConfig->input_last_name) {
                $defaultInputs[] = [
                    'label' => $nameCombined ? 'Nama' : 'Nama Belakang',
                    'name' => 'last_name',
                    'type' => 'text',
                    'required' => false
                ];
            }

            if ($defaultConfig->input_email) {
                $defaultInputs[] = [
                    'label' => 'Email',
                    'name' => 'email',
                    'type' => 'email',
                    'required' => true
                ];
            }

            if ($defaultConfig->input_phone_number) {
                $defaultInputs[] = [
                    'label' => 'No. HP',
                    'name' => 'phone_number',
                    'type' => 'text',
                    'required' => true
                ];
            }

            if ($defaultConfig->input_document) {
                $defaultInputs[] = [
                    'label' => $documentLabel,
                    'name' => 'input_document',
                    'type' => 'file',
                    'required' => false
                ];
            }
        }

        $customInputs = CustomInputRegistration::where('event_id', $event->id)
            ->where('status', true)
            ->get();

        return view('user.form_registration.form', compact('event', 'defaultInputs', 'customInputs'));
    }

    /**
     * Generate QR Code untuk peserta.
     */

    private function generateQRCode($text, $filename, $event)
    {
        // Ambil logo dari event, kalau tidak ada pakai default
        $logoPath = null;

        if (!empty($event->qr_logo) && Storage::disk('public')->exists($event->qr_logo)) {
            // Ambil path absolut
            $logoPath = storage_path('app/public/' . $event->qr_logo);
        } else {
            $logoPath = public_path('images/logo.png'); // fallback
        }

        $builder = new Builder(
            writer: new PngWriter(),
            writerOptions: [],
            validateResult: false,
            data: $text,
            encoding: new Encoding('UTF-8'),
            errorCorrectionLevel: ErrorCorrectionLevel::High,
            size: 300,
            margin: 10,
            roundBlockSizeMode: RoundBlockSizeMode::Margin,
            logoPath: $logoPath,
            logoResizeToWidth: 75,
            logoPunchoutBackground: true
        );

        $result = $builder->build();

        $path = storage_path('app/public/qrcodes/' . $filename);
        $result->saveToFile($path);

        return $result->getDataUri();
    }

    /**
     * Menyimpan data registrasi peserta.
     */
    public function submit(Request $request, $link)
    {
        $registrationLink = EventRegistrationLink::where('link', $link)->firstOrFail();
        $event = $registrationLink->event;
        $eventId = $event->id;

        // Ambil input aktif
        $defaultInputs = DefaultInputRegistrationStatus::where('event_id', $eventId)->first();
        $customInputs = CustomInputRegistration::where('event_id', $eventId)->where('status', true)->get();

        // Validasi default
        $rules = [];
        if ($defaultInputs->input_first_name)
            $rules['first_name'] = 'required|string|max:255';
        if ($defaultInputs->input_last_name)
            $rules['last_name'] = 'nullable|string|max:255';
        if ($defaultInputs->input_email)
            $rules['email'] = 'required|email';
        if ($defaultInputs->input_phone_number)
            $rules['phone_number'] = 'required|string';
        if ($defaultInputs->input_document)
            $rules['input_document'] = 'nullable|file|mimes:pdf,jpg,png|max:2048';

        // Validasi custom
        foreach ($customInputs as $input) {
            $rules['custom.' . $input->name] = $input->is_required ? 'required|string' : 'nullable|string';
        }

        $validated = $request->validate($rules);

        // Simpan ke tabel attendees
        $attendee = Attendee::create([
            'event_id' => $event->id,
            'first_name' => $request->first_name ?? null,
            'last_name' => $request->last_name ?? null,
            'email' => $request->email ?? null,
            'phone_number' => $request->phone_number ?? null,
            'input_document' => $request->input_document ?? null,
            'code' => strtoupper(Str::random(20)),
        ]);

        // Kalau ada file dokumen, simpan filenya
        if ($request->hasFile('input_document')) {
            $file = $request->file('input_document');
            $path = $file->store('documents', 'public');
            $attendee->update(['input_document' => $path]);
        }

        // Generate qrcode_data sesuai format
        $qrcodeData = $attendee->id . $attendee->code . 'event' . $event->id;

        // Ambil salah satu nama (prioritas first_name, kalau kosong pakai last_name)
        $namePart = $attendee->first_name ?: $attendee->last_name;

        // Pastikan nama aman untuk nama file (hapus spasi dan karakter aneh)
        $namePart = preg_replace('/[^A-Za-z0-9_\-]/', '_', $namePart);

        // Buat filename dari nama
        $qrFilename = $namePart . '_' . $attendee->code . '.png';

        // Generate QR Code dengan logo sesuai event
        $this->generateQRCode($qrcodeData, $qrFilename, $event);

        // Simpan path QR ke attendee (opsional kalau mau di table attendees juga)
        $attendee->update(['qr_code_path' => 'qrcodes/' . $qrFilename]);

        // Simpan ke tabel qr_codes
        QRCode::create([
            'event_id' => $event->id,
            'attendee_id' => $attendee->id,
            'qrcode_data' => $qrcodeData,
            'valid_until' => now()->addDays(7), // contoh valid 7 hari
        ]);

        // Simpan custom input values
        $customValues = $request->input('custom', []);

        foreach ($customInputs as $input) {
            $value = $customValues[$input->name] ?? null;
            if ($value !== null) {
                CustomInputRegistrationValue::create([
                    'custom_input_id' => $input->id,
                    'event_id' => $event->id,
                    'attendee_id' => $attendee->id,
                    'name' => $input->name,
                    'value' => $value,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Registrasi berhasil!');
    }

    /**
     * Admin: Tampilkan form edit input registrasi (default + custom).
     */
    public function editInputs($eventId)
    {
        $event = Event::findOrFail($eventId);
        $defaultInputs = DefaultInputRegistrationStatus::firstOrCreate(['event_id' => $eventId]);
        $customInputs = CustomInputRegistration::where('event_id', $eventId)->get();

        return view('admin.event_registration.admin_input_form', compact('event', 'defaultInputs', 'customInputs'));
    }

    /**
     * Admin: Simpan pengaturan input (default + custom).
     */
    public function updateInputs(Request $request, $eventId)
    {
        $default = DefaultInputRegistrationStatus::updateOrCreate(
            ['event_id' => $eventId],
            [
                'input_document' => $request->has('input_document'),
                'input_first_name' => $request->has('input_first_name'),
                'input_last_name' => $request->has('input_last_name'),
                'input_email' => $request->has('input_email'),
                'input_phone_number' => $request->has('input_phone_number'),
            ]
        );

        // Ambil semua custom input lama dari DB
        $existingCustomInputs = CustomInputRegistration::where('event_id', $eventId)->get()->keyBy('id');

        // Custom input dari request
        $submittedInputs = $request->input('custom_inputs', []);

        // Loop input yang dikirim (update/create)
        foreach ($submittedInputs as $id => $data) {
            $status = isset($data['status']) && $data['status'] == '1';

            CustomInputRegistration::updateOrCreate(
                ['id' => $id, 'event_id' => $eventId],
                [
                    'name' => $data['name'],
                    'type' => $data['type'],
                    'status' => $status,
                    'created_by' => Auth::id() ?? 1,
                    'updated_by' => Auth::id() ?? 1,
                ]
            );

            // Hapus dari list existing karena sudah diproses
            $existingCustomInputs->forget($id);
        }

        // Sisanya berarti tidak dikirim → status jadi false
        foreach ($existingCustomInputs as $input) {
            $input->update([
                'status' => false,
                'updated_by' => Auth::id() ?? 1,
            ]);
        }

        $deletedIds = array_filter(explode(',', $request->input('deleted_input_ids', '')));
        if (count($deletedIds)) {
            CustomInputRegistration::where('event_id', $eventId)
                ->whereIn('id', $deletedIds)
                ->delete();
        }

        return redirect()->back()->with('success', 'Pengaturan input berhasil diperbarui.');
    }
}
