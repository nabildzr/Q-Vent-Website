<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
use App\Models\EventAdmin;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventAdminFactory extends Factory
{
    public function definition(): array
    {
        return [
            'event_id' => Event::inRandomOrder()->first()?->id ?? Event::factory(),
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
        ];
    }
}
