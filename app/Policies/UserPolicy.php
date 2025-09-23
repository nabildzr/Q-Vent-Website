<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function restore(User $user, User $model): bool
    {
        return $user->role === 'super_admin';
    }

    public function forceDelete(User $user, User $model): bool
    {
        return $user->role === 'super_admin';
    }
}

