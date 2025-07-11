<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\EventCategory;
use App\Models\User;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        Event::factory()->count(10)->create();
    }
}
