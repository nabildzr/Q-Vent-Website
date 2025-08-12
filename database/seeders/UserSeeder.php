<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->count(10)->create();

        User::create([
            'name' => 'Example User',
            'email' => 'example@gmail.com',
            'role' => 'admin',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'phone_number' => '62812112',
        ]);
    }
}
