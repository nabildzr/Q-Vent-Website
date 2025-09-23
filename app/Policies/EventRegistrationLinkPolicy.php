<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Event;
use App\Models\EventRegistrationLink;
use Illuminate\Support\Facades\Auth;

class EventRegistrationLinkPolicy
{
    /**
     * Update registration link.
     * - super_admin bisa update semua
     * - pembuat event bisa update
     * - admin pendamping TIDAK boleh
     */
    public function update(User $user, EventRegistrationLink $link): bool
    {
        $event = $link->event;

        if ($user->role === 'super_admin') {
            return true;
        } else {
            if ($event->created_by === $user->id) {
                return true;
            } else {
                return false;
            }
        }
    }
}
