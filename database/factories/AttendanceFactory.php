<?php

namespace Database\Factories;

use App\Models\Attendance;
use App\Models\Attendee;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceFactory extends Factory
{
    public function definition(): array
    {
        $attendee = Attendee::inRandomOrder()->with('event')->first() ?? Attendee::factory()->create();

        $event = $attendee->event;

        $checkInTime = now();

        if ($event && $event->start_date && now()->lt($event->start_date)) {
            $checkInTime = $this->faker->dateTimeBetween($event->start_date, $event->start_date->copy()->addHours(2));
        }

        return [
            'attendee_id' => $attendee->id,
            'event_id' => $attendee->event_id,
            'status' => $this->faker->randomElement(['present', 'absent', 'late']),
            'check_in_time' => $checkInTime,
            'notes' => $this->faker->optional()->sentence(),
        ];
    }
}
