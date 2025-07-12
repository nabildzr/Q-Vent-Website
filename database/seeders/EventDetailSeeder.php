<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\EventDetail;

class EventDetailSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan sudah ada event
        if (Event::count() === 0) {
            Event::factory()->count(5)->create();
        }

        // Setiap event hanya boleh punya 1 detail
        Event::all()->each(function ($event) {
            if (!$event->eventDetail) {
                EventDetail::factory()->create([
                    'event_id' => $event->id,
                ]);
            }
        });
    }
}
