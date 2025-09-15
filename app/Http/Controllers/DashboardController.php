<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        // Filter event sesuai role
        if (Gate::allows('isSuperAdmin')) {
            $events = Event::with('createdBy')->get();
        } else {
            $events = Event::with('createdBy')
                ->where('created_by', $user->id)
                ->orWhereHas('admins', fn($q) => $q->where('users.id', $user->id))
                ->get();
        }

        // Pisahkan event berdasarkan waktu/status
        $now = Carbon::now();

        $eventUpcoming = $events->filter(fn($e) => Carbon::parse($e->start_date)->isFuture());
        $eventOngoing = $events->filter(fn($e) =>
            Carbon::parse($e->start_date)->lte($now) && Carbon::parse($e->end_date)->gte($now)
        );
        $eventPast = $events->filter(fn($e) => Carbon::parse($e->end_date)->lt($now));

        // Count sesuai kebutuhan
        $countEventDone = $events->where('status', 'done')->count();
        $countEventActive = $events->where('status', 'active')->count();
        $countEventOngoing = $eventOngoing->count();
        $countAllEvent = $events->count();

        // Untuk super_admin: data admin terbaru
        $latestAdmins = [];
        $countAdmins = 0;
        if (Gate::allows('isSuperAdmin')) {
            $latestAdmins = User::where('role', 'admin')->latest()->take(5)->get();
            $countAdmins = User::where('role', 'admin')->count();
        }

        return view('admin.dashboard.index', compact(
            'eventUpcoming',
            'eventOngoing',
            'eventPast',
            'countEventDone',
            'countEventActive',
            'countEventOngoing',
            'countAllEvent',
            'latestAdmins',
            'countAdmins'
        ));
    }
}
