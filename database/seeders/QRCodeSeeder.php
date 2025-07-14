<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QRCode;
use App\Models\Attendee;

class QRCodeSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan attendee ada
        if (Attendee::count() === 0) {
            Attendee::factory()->count(50)->create();
        }

        // Hanya generate QRCode jika belum ada
        Attendee::all()->each(function ($attendee) {
            QRCode::firstOrCreate([
                'attendee_id' => $attendee->id,
                'event_id' => $attendee->event_id,
            ], [
                'qrcode_data' => $attendee->code . $attendee->event_id,
                'valid_until' => now()->addDays(rand(1, 10)),
            ]);
        });
    }
}
