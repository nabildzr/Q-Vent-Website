<?php

namespace Database\Factories;

use App\Models\Attendee;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AttendeeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'event_id' => Event::inRandomOrder()->first()?->id ?? Event::factory(),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'phone_number' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'code' => strtoupper(Str::random(8)),
        ];
    }
}
