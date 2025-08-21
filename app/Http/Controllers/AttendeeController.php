<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Attendee;
use Illuminate\Http\Request;

class AttendeeController extends Controller
{
    public function index($eventId)
    {
        $event = Event::findOrFail($eventId);
        $attendees = $event->attendees()->with('attendance')->get();

        return view('admin.attendee.index', compact('event', 'attendees'));
    }

    public function edit($id)
    {
        $attendee = Attendee::findOrFail($id);
        return view('admin.attendee.edit', compact('attendee'));
    }

    public function update(Request $request, $id)
    {
        $attendee = Attendee::findOrFail($id);

        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'nullable|string|max:100',
            'email' => 'nullable|email|max:150',
            'phone_number' => 'nullable|string|max:20',
        ]);

        $attendee->update($request->only(['first_name', 'last_name', 'email', 'phone_number']));

        return redirect()
            ->route('admin.attendee.index', $attendee->event_id) // kirim event_id biar balik ke daftar
            ->with('success', 'Data attendee berhasil diperbarui.');
    }

    public function show($id)
    {
        $attendee = Attendee::with([
            'event',
            'qrCodeLogs' => function ($q) {
                $q->latest();
            },
            'customInputs'
        ])->findOrFail($id);
        $event = $attendee->event;

        $attendance = $attendee->qrCodeLogs->first();

        return view('admin.attendee.show', compact('attendee', 'attendance', 'event'));
    }


    public function destroy($id)
    {
        $attendee = Attendee::findOrFail($id);
        $attendee->delete();

        return redirect()->back()->with('success', 'Data attendee berhasil dihapus.');
    }
}
