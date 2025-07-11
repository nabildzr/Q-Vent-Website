<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attendee;

class AttendeeSeeder extends Seeder
{
    public function run(): void
    {
        Attendee::factory()->count(50)->create();
    }
}
