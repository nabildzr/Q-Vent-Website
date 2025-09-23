<?php

namespace App\Policies;

use App\Models\User;
use App\Models\EventCategory;

class EventCategoryPolicy
{
    public function restore(User $user, EventCategory $model): bool
    {
        return $user->role === 'super_admin';
    }

    public function forceDelete(User $user, EventCategory $model): bool
    {
        return $user->role === 'super_admin';
    }
}
