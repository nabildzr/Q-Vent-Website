<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventCategory;
use App\Models\Attendee;
use App\Models\User;

class TrashController extends Controller
{
    public function events()
    {
        $this->authorize('isSuperAdmin'); // cuma super admin

        $events = Event::onlyTrashed()->get();
        return view('admin.trash.events', compact('events'));
    }

    public function categories()
    {
        $this->authorize('isSuperAdmin'); // cuma super admin

        $categories = EventCategory::onlyTrashed()->get();
        return view('admin.trash.categories', compact('categories'));
    }

    public function users()
    {
        $this->authorize('isSuperAdmin'); // cuma super admin

        $users = User::onlyTrashed()->get();
        return view('admin.trash.users', compact('users'));
    }

    /**
     * Step 1 - tampilkan list event yang punya attendee terhapus
     */
    public function attendeesIndex()
    {
        $user = auth()->user();

        if ($user->role === 'super_admin') {
            $events = Event::whereHas('attendees', fn($q) => $q->onlyTrashed())->get();
        } else {
            $events = Event::where('created_by', $user->id)
                ->whereHas('attendees', fn($q) => $q->onlyTrashed())
                ->get();
        }

        return view('admin.trash.attendees.index', compact('events'));
    }

    /**
     * Step 2 - tampilkan list attendee terhapus dari event tertentu
     */
    public function attendeesShow(Event $event)
    {
        $user = auth()->user();

        // super_admin boleh lihat semua dan admin cuma event miliknya
        if ($user->role !== 'super_admin' && $event->created_by !== $user->id) {
            abort(403);
        }

        $attendees = $event->attendees()->onlyTrashed()->get();

        return view('admin.trash.attendees.show', compact('event', 'attendees'));
    }

    public function restore($type, $id)
    {
        $model = $this->getModel($type)::onlyTrashed()->findOrFail($id);
        $this->authorize('restore', $model);
        $model->restore();

        return back()->with('success', ucfirst($type) . ' berhasil direstore.');
    }

    public function forceDelete($type, $id)
    {
        $model = $this->getModel($type)::onlyTrashed()->findOrFail($id);
        $this->authorize('forceDelete', $model);

        if ($type === 'events') {
            $event = $model;

            // Hapus banner event jika ada
            if ($event->banner && \Storage::disk('public')->exists($event->banner)) {
                \Storage::disk('public')->delete($event->banner);
            }

            // Hapus qr_logo event jika ada
            if ($event->qr_logo && \Storage::disk('public')->exists($event->qr_logo)) {
                \Storage::disk('public')->delete($event->qr_logo);
            }

            // Hapus semua foto event (eventPhotos)
            foreach ($event->eventPhotos as $photo) {
                if ($photo->photo && \Storage::disk('public')->exists($photo->photo)) {
                    \Storage::disk('public')->delete($photo->photo);
                }
                $photo->delete(); // hapus dari database
            }
        }

        $model->forceDelete();

        return back()->with('success', ucfirst($type) . ' berhasil dihapus permanen.');
    }

    private function getModel($type)
    {
        return match ($type) {
            'events' => Event::class,
            'categories' => EventCategory::class,
            'attendees' => Attendee::class,
            'users' => User::class,
            default => abort(404),
        };
    }
}
