<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventPhoto;
use App\Models\EventRegistrationLink;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('admin.event.index')->with([
            'events' => $events
        ]);
    }

    public function create()
    {
        $existingLinks = EventRegistrationLink::pluck('link')->toArray();

        return view('admin.event.form', [
            'event' => new Event(), // kalo create, kita buat instance baru
            'isEdit' => false, // menandakan ini adalah form untuk membuat event baru
            'users' => User::all(),
            'existingLinks' => $existingLinks,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required|max:255',
            'location' => 'required',
            'event_category_id' => 'required|exists:event_categories,id',
            'created_by' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'banner' => 'nullable|image|max:2048',
            'qr_logo' => 'nullable|image|max:2048',
            'admins' => 'nullable|array',
            'admins.*' => 'exists:users,id',
            'photos.*' => 'nullable|image|max:2048',
        ]);

        // Upload banner
        $bannerPath = $request->hasFile('banner')
            ? $request->file('banner')->store('banners', 'public')
            : null;

        // Upload QR Logo
        $qrLogoPath = $request->hasFile('qr_logo')
            ? $request->file('qr_logo')->store('qr_logos', 'public')
            : null;

        // Simpan event
        $event = Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'event_category_id' => $request->event_category_id,
            'created_by' => $request->created_by,
            'status' => 'active',
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'banner' => $bannerPath,
            'qr_logo' => $qrLogoPath,
        ]);

        $link = preg_replace('/[^a-z0-9]+/', '-', strtolower($request->title));
        $link = trim($link, '-');

        // Cek dan buat link unik jika sudah ada
        $baseLink = $link;
        $counter = 1;
        while (EventRegistrationLink::where('link', $link)->exists()) {
            $link = $baseLink . '-' . $counter++;
        }

        EventRegistrationLink::create([
            'event_id' => $event->id,
            'status_id' => 'open',
            'link' => $link,
            'valid_until' => now()->addDays(30),
        ]);

        // Simpan admin pendamping (jika ada)
        if ($request->has('admins')) {
            $event->admins()->sync($request->admins); // event_admins pivot
        }

        // Upload foto-foto event
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $photoPath = $photo->store('event_photos', 'public');
                $event->eventPhotos()->create(['photo' => $photoPath]);
            }
        }

        return redirect()->route('admin.event.index')->with('success', 'Event berhasil dibuat.');
    }

    public function show(Event $event)
    {
        $allLinks = EventRegistrationLink::where('id', '!=', optional($event->registrationLink)->id)
            ->pluck('link')
            ->toArray();

        return view('admin.event.show', compact('event', 'allLinks'));
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);

        $existingLinks = EventRegistrationLink::pluck('link')->toArray();
        return view('admin.event.form', [
            'event' => $event, // kalo edit, kita ambil data event yang ada
            'isEdit' => true, // menandakan ini adalah form untuk mengedit event yang sudah ada
            'users' => User::all(),
            'existingLinks' => $existingLinks,
        ]);
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'description' => 'required|max:255',
            'location' => 'required',
            'event_category_id' => 'required|exists:event_categories,id',
            'created_by' => 'required|exists:users,id',
            'status' => 'required|in:active,done,cancelled',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'banner' => 'nullable|image|max:2048',
            'qr_logo' => 'nullable|image|max:2048',
            'admins' => 'nullable|array',
            'admins.*' => 'exists:users,id',
            'photos.*' => 'nullable|image|max:2048',
        ]);

        // Banner
        $bannerPath = $event->banner;
        if ($request->hasFile('banner')) {
            if ($event->banner && Storage::disk('public')->exists($event->banner)) {
                Storage::disk('public')->delete($event->banner);
            }
            $bannerPath = $request->file('banner')->store('banners', 'public');
        }

        // QR Logo
        $qrLogoPath = $event->qr_logo;

        // Jika user hapus QR logo
        if ($request->remove_qr_logo == "1") {
            if ($event->qr_logo && Storage::disk('public')->exists($event->qr_logo)) {
                Storage::disk('public')->delete($event->qr_logo);
            }
            $qrLogoPath = null;
        }

        // Jika upload baru
        if ($request->hasFile('qr_logo')) {
            if ($event->qr_logo && Storage::disk('public')->exists($event->qr_logo)) {
                Storage::disk('public')->delete($event->qr_logo);
            }
            $qrLogoPath = $request->file('qr_logo')->store('qr_logos', 'public');
        }

        // Update event
        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'event_category_id' => $request->event_category_id,
            'created_by' => $request->created_by,
            'status' => $request->status,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'banner' => $bannerPath,
            'qr_logo' => $qrLogoPath,
        ]);

        // Update admin pendamping
        $event->admins()->sync($request->admins ?? []);

        // Upload foto-foto baru
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $photoPath = $photo->store('event_photos', 'public');
                $event->eventPhotos()->create(['photo' => $photoPath]);
            }
        }

        // Hapus foto lama yang dipilih
        if ($request->has('removed_photos')) {
            foreach ($request->removed_photos as $photoId) {
                $photo = EventPhoto::find($photoId);
                if ($photo) {
                    if (Storage::disk('public')->exists($photo->photo)) {
                        Storage::disk('public')->delete($photo->photo);
                    }
                    $photo->delete();
                }
            }
        }

        return redirect()->route('admin.event.index')->with('success', 'Event berhasil diperbarui.');
    }

    public function updateRegistrationLink(Request $request, $id)
    {
        $request->validate([
            'link' => [
                'required',
                'string',
                'max:255',
                Rule::unique('event_registration_links', 'link')->ignore($id),
            ],
            'valid_until' => 'required|date',
        ]);

        $link = EventRegistrationLink::findOrFail($id);

        $link->update([
            'link' => $request->link,
            'valid_until' => $request->valid_until,
        ]);

        return redirect()->back()->with('success', 'Registration link berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $event = Event::with('eventPhotos')->findOrFail($id);

        if ($event->banner && Storage::disk('public')->exists($event->banner)) {
            Storage::disk('public')->delete($event->banner);
        }

        if ($event->qr_logo && Storage::disk('public')->exists($event->qr_logo)) {
            Storage::disk('public')->delete($event->qr_logo);
        }

        foreach ($event->eventPhotos as $photo) {
            if (Storage::disk('public')->exists($photo->photo)) {
                Storage::disk('public')->delete($photo->photo);
            }
            $photo->delete(); // hapus dari database
        }

        $event->admins()->detach();

        if ($event->registrationLink) {
            $event->registrationLink->delete();
        }

        $event->delete();

        return redirect()->route('admin.event.index')->with('success', 'Event berhasil dihapus.');
    }
}
