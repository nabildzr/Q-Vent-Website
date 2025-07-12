<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventRegistrationLinkFactory extends Factory
{
    public function definition(): array
    {
        $event = Event::inRandomOrder()->first() ?? Event::factory()->create();

        return [
            'event_id' => $event->id,
            'status' => $this->faker->randomElement(['open', 'closed']),
            'link' => $this->faker->url(),
            'valid_until' => $this->faker->dateTimeBetween('+1 days', '+1 month'),
        ];
    }
}
