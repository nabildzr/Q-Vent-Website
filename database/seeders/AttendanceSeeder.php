<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attendance;
use App\Models\Attendee;

class AttendanceSeeder extends Seeder
{
    public function run(): void
    {
        if (Attendee::count() === 0) {
            Attendee::factory()->count(50)->create();
        }

        Attendee::inRandomOrder()->take(30)->each(function ($attendee) {
            Attendance::factory()->create([
                'attendee_id' => $attendee->id,
                'event_id' => $attendee->event_id,
            ]);
        });
    }
}
