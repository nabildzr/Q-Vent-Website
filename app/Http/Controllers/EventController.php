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
            'status' => 'required|in:active,done,cancelled',
            'start_date' => 'required|date',
            'banner' => 'nullable|image|max:2048',
            'admins' => 'nullable|array',
            'admins.*' => 'exists:users,id',
            'photos.*' => 'nullable|image|max:2048',
        ]);

        $bannerPath = null;

        if ($request->hasFile('banner')) {

            $bannerPath = $request->file('banner')->store('banners', 'public');

            // Cek apakah benar-benar tersimpan
            if (!Storage::disk('public')->exists($bannerPath)) {
                return back()
                    ->withErrors(['banner' => 'Gagal menyimpan gambar banner. Coba lagi.'])
                    ->withInput();
            }
        }

        $event = Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'event_category_id' => $request->event_category_id,
            'created_by' => $request->created_by,
            'status' => $request->status,
            'start_date' => $request->start_date,
            'banner' => $bannerPath,
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

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                if ($photo->isValid()) {
                    \Log::info("Uploading photo for event ID: " . $event->id);
                    $photoPath = $photo->store('event_photos', 'public');
                    EventPhoto::create([
                        'event_id' => $event->id,
                        'photo' => $photoPath,
                    ]);
                } else {
                    \Log::warning("Invalid photo upload attempt", [
                        'error' => $photo->getErrorMessage(),
                        'name' => $photo->getClientOriginalName()
                    ]);
                }
            }
        }

        return redirect()->route('admin.event.index')->with('success', 'Event berhasil ditambahkan.');
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
            'banner' => 'nullable|image|max:2048',
            'admins' => 'nullable|array',
            'admins.*' => 'exists:users,id',
            'photos.*' => 'nullable|image|max:2048',
        ]);

        $bannerPath = $event->banner;

        if ($request->hasFile('banner')) {
            if ($event->banner && Storage::disk('public')->exists($event->banner)) {
                Storage::disk('public')->delete($event->banner);
            }

            $bannerPath = $request->file('banner')->store('banners', 'public');

            // Cek tersimpan atau tidak
            if (!Storage::disk('public')->exists($bannerPath)) {
                return back()
                    ->withErrors(['banner' => 'Gagal menyimpan gambar banner baru. Coba lagi.'])
                    ->withInput();
            }
        }

        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'event_category_id' => $request->event_category_id,
            'created_by' => $request->created_by,
            'status' => $request->status,
            'start_date' => $request->start_date,
            'banner' => $bannerPath,
        ]);

        // Sync ulang admin pendamping menggunakan relasi eventAdmin
        $eventAdmin = $event->admins();
        $eventAdmin->sync($request->admins ?? []);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                if ($photo->isValid()) {
                    \Log::info("Uploading photo for event ID: " . $event->id);
                    $photoPath = $photo->store('event_photos', 'public');
                    EventPhoto::create([
                        'event_id' => $event->id,
                        'photo' => $photoPath,
                    ]);
                } else {
                    \Log::warning("Invalid photo upload attempt", [
                        'error' => $photo->getErrorMessage(),
                        'name' => $photo->getClientOriginalName()
                    ]);
                }
            }
        }

        // Hapus foto lama jika ada yang diminta dihapus
        if ($request->has('removed_photos')) {
            foreach ($request->removed_photos as $photoId) {
                $photo = EventPhoto::find($photoId);
                if ($photo) {
                    // Hapus dari storage jika ada
                    if (Storage::disk('public')->exists($photo->photo)) {
                        Storage::disk('public')->delete($photo->photo);
                    }

                    // Hapus dari database
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
