<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\EventPhoto;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventPhotoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'event_id' => Event::inRandomOrder()->first()?->id ?? Event::factory(),
            'photo' => 'uploads/events/' . $this->faker->uuid() . '.jpg',
        ];
    }
}
