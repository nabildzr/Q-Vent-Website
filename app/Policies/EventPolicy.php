<?php

namespace App\Policies;

use App\Models\Event;
use App\Models\User;

class EventPolicy
{
    /**
     * Semua role boleh lihat daftar event kalau super_admin
     */
    public function viewAny(User $user): bool
    {
        if ($user->role === 'super_admin') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Bisa lihat detail event.
     * - super_admin: semua event
     * - admin pembuat: event yg dia buat
     * - admin pendamping: event yg dia dampingi
     */
    public function view(User $user, Event $event): bool
    {
        if ($user->role === 'super_admin') {
            return true;
        } else {
            if ($event->created_by === $user->id) {
                return true;
            } else {
                if ($event->admins()->where('user_id', $user->id)->exists()) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }

    /**
     * Hanya super_admin & admin biasa yg bisa create event
     */
    public function create(User $user): bool
    {
        if ($user->role === 'super_admin' || $user->role === 'admin') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Update event.
     * - super_admin: semua
     * - admin pembuat: event miliknya
     * - admin pendamping: TIDAK BISA
     */
    public function update(User $user, Event $event): bool
    {
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

    /**
     * Hapus event.
     * - super_admin: semua
     * - admin pembuat: event miliknya
     * - admin pendamping: TIDAK BISA
     */
    public function delete(User $user, Event $event): bool
    {
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

    public function restore(User $user, Event $event): bool
    {
        if ($this->delete($user, $event)) {
            return true;
        } else {
            return false;
        }
    }

    public function forceDelete(User $user, Event $event): bool
    {
        if ($this->delete($user, $event)) {
            return true;
        } else {
            return false;
        }
    }
}
