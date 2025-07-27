<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventPhoto;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

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
        return view('admin.event.form', [
            'event' => new Event(), // kalo create, kita buat instance baru
            'isEdit' => false, // menandakan ini adalah form untuk membuat event baru
            'users' => User::all(),
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

    public function show($id)
    {
        $event = Event::with(['eventCategory', 'createdBy', 'admins', 'eventPhotos'])->findOrFail($id);
        return view('admin.event.show', compact('event'));
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.event.form', [
            'event' => $event, // kalo edit, kita ambil data event yang ada
            'isEdit' => true, // menandakan ini adalah form untuk mengedit event yang sudah ada
            'users' => User::all(),
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

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('admin.event.index')->with('success', 'Event berhasil dihapus.');
    }
}
