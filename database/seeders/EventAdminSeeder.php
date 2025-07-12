<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EventAdmin;
use App\Models\Event;
use App\Models\User;

class EventAdminSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan ada event dan user dulu
        if (Event::count() === 0) {
            Event::factory()->count(5)->create();
        }

        if (User::count() === 0) {
            User::factory()->count(5)->create();
        }

        // Setiap event punya 1–3 admin (random)
        Event::all()->each(function ($event) {
            $adminUsers = User::inRandomOrder()->take(rand(1, 3))->get();

            foreach ($adminUsers as $user) {
                EventAdmin::firstOrCreate([
                    'event_id' => $event->id,
                    'user_id' => $user->id,
                ]);
            }
        });
    }
}
