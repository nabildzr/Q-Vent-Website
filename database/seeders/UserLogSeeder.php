<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserLog;

class UserLogSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan user tersedia
        if (User::count() === 0) {
            User::factory()->count(10)->create();
        }

        User::all()->each(function ($user) {
            UserLog::factory()->count(rand(3, 7))->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
