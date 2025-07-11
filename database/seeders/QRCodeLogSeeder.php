<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QRCodeLog;
use App\Models\QRCode;
use App\Models\Attendee;

class QRCodeLogSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan QRCode dan Attendee tersedia
        if (QRCode::count() === 0) {
            QRCode::factory()->count(50)->create();
        }

        // Generate log scan untuk sebagian attendee
        Attendee::inRandomOrder()->take(30)->each(function ($attendee) {
            QRCodeLog::factory()->count(rand(1, 3))->create([
                'attendee_id' => $attendee->id,
            ]);
        });
    }
}
