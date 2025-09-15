<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\EventCategory;
use App\Models\User;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        Event::factory()->count(20)->create();

        for ($i = 1; $i <= 50; $i++) {
            Event::create([
            'title' => "Sample Event $i",
            'description' => "This is a sample event description for event $i",
            'location' => "Sample Location $i",
            'event_category_id' => EventCategory::first()->id ?? 1,
            'created_by' => User::first()->id ?? 1,
            'status' => 'active',
            'start_date' => now()->addDays(7 + $i),
            'end_date' => now()->addDays(8 + $i),
            'banner' => '',
            'qr_logo' => null,
            ]);
        }
    }
}
