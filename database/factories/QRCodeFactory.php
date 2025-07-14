<?php

namespace Database\Factories;

use App\Models\QRCode;
use App\Models\Attendee;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class QRCodeFactory extends Factory
{
    public function definition(): array
    {
        $attendee = Attendee::inRandomOrder()->first() ?? Attendee::factory()->create();
        $event = $attendee->event ?? Event::find($attendee->event_id) ?? Event::factory()->create();

        return [
            'event_id' => $event->id,
            'attendee_id' => $attendee->id,
            'qrcode_data' => $attendee->code . $event->id,
            'valid_until' => now()->addDays(rand(1, 10)),
        ];
    }
}
