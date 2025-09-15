<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\EventCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EventFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(),
            'location' => $this->faker->address(),
            'event_category_id' => EventCategory::inRandomOrder()->first()?->id ?? EventCategory::factory(),
            'created_by' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'status' => $this->faker->randomElement(['active', 'done', 'cancelled']),
            'start_date' => $this->faker->dateTimeBetween('-1 months', '+1 days'),
            'end_date' => $this->faker->dateTimeBetween('+1 days', '+1 months'),
            'qr_logo' => 'qr_logos/' . Str::random(10) . '.jpg',
            'banner' => 'banners/' . Str::random(10) . '.jpg',
        ];
    }
}
