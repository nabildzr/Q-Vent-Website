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
            'name' => 'Super Admin Nz',
            'email' => 'mnazrielalamsyah25@gmail.com',
            'role' => 'super_admin',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'phone_number' => '6289509827741',
        ]);
    }
}
