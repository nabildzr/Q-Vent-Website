<?php

namespace Database\Factories;

use App\Models\QRCodeLog;
use App\Models\QRCode;
use App\Models\Attendee;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class QRCodeLogFactory extends Factory
{
    public function definition(): array
    {
        $attendee = Attendee::inRandomOrder()->first() ?? Attendee::factory()->create();
        $qr = $attendee->qrcode ?? QRCode::where('attendee_id', $attendee->id)->first()
            ?? QRCode::factory()->create(['attendee_id' => $attendee->id, 'event_id' => $attendee->event_id]);

        return [
            'qr_code_id' => $qr->id,
            'attendee_id' => $attendee->id,
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'status' => $this->faker->randomElement(['scanned', 'invalid']),
        ];
    }
}
