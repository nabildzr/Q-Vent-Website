<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
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
            'isEdit' => false // menandakan ini adalah form untuk membuat event baru
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

        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'event_category_id' => $request->event_category_id,
            'created_by' => $request->created_by,
            'status' => $request->status,
            'start_date' => $request->start_date,
            'banner' => $bannerPath,
        ]);
        
        EventPhoto::create();


        return redirect()->route('admin.event.index')->with('success', 'Event berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.event.form', [
            'event' => $event, // kalo edit, kita ambil data event yang ada
            'isEdit' => true // menandakan ini adalah form untuk mengedit event yang sudah ada
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

        return redirect()->route('admin.event.index')->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('admin.event.index')->with('success', 'Event berhasil dihapus.');
    }
}
