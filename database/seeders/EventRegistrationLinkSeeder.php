<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\EventRegistrationLink;

class EventRegistrationLinkSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan event tersedia
        if (Event::count() === 0) {
            Event::factory()->count(5)->create();
        }

        // Setiap event punya 1–2 link pendaftaran
        Event::all()->each(function ($event) {
            EventRegistrationLink::factory()->count(rand(1, 2))->create([
                'event_id' => $event->id,
            ]);
        });
    }
}
