<?php

namespace App\Policies;

use App\Models\Attendee;
use App\Models\User;

class AttendeePolicy
{
    public function restore(User $user, Attendee $attendee): bool
    {
        return $user->role === 'super_admin'
            || ($user->role === 'admin' && $attendee->event->created_by === $user->id);
    }

    public function forceDelete(User $user, Attendee $attendee): bool
    {
        return $this->restore($user, $attendee);
    }
}
