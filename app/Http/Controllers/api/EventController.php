<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function getEventById(Request $request, $id)
    {
        $event = Event::find($id);
        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        return response()->json($event);
    }

    public function getAllEvents(Request $request)
    {
        $events = Event::all();

        return response()->json($events);
    }

    public function getUserEvents(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $events = $user->eventAdminAssigned;


        return response()->json([
            $events
        ], 200);
    }

    public function getUserEventsUpcoming(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $events = $user->activeEvents;

        if ($events->isEmpty()) {
            return response()->json(['message' => 'No upcoming events found for this user'], 404);
        }

        return response()->json(
            $events,
            200
        );
    }

    public function getUserEventsDone(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $events = $user->doneEvents;

        if ($events->isEmpty()) {
            return response()->json(['message' => 'No done events found for this user'], 404);
        }

        return response()->json(
            $events,
            200
        );
    }

    public function getUserEventsOnGoing(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        $events = $user->ongoingEvents;

        if ($events->isEmpty()) {
            return response()->json(['message' => 'No ongoing events found for this user'], 404);
        }

        return response()->json(
            $events,
            200
        );
    }
}
