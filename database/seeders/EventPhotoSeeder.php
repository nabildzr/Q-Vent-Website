<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\EventPhoto;

class EventPhotoSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan event sudah tersedia
        if (Event::count() === 0) {
            Event::factory()->count(5)->create();
        }

        // Setiap event punya 2–5 foto
        Event::all()->each(function ($event) {
            EventPhoto::factory()->count(rand(2, 5))->create([
                'event_id' => $event->id,
            ]);
        });
    }
}
