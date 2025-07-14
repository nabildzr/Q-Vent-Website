<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserLogFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'action' => $this->faker->randomElement([
                'login', 'logout', 'update_profile', 'change_password', 'delete_account'
            ]),
            'ip_address' => $this->faker->ipv4(),
            'device_info' => $this->faker->userAgent(),
            'status' => $this->faker->randomElement(['success', 'failed']),
        ];
    }
}
