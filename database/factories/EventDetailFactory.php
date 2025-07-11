<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\EventDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventDetailFactory extends Factory
{
    public function definition(): array
    {

        $isVirtual = $this->faker->boolean();

        return [
            'event_id' => Event::inRandomOrder()->first()?->id ?? Event::factory(),
            'participant_count' => $this->faker->numberBetween(50, 500),
            'registration_link' => $this->faker->url(),
            'is_virtual' => $isVirtual,
            'platform_url' => $isVirtual ? $this->faker->url() : '-',
            'agenda' => $this->faker->paragraph(),
        ];

    }
}
