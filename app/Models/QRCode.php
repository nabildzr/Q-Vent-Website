<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QRCode extends Model
{
    /** @use HasFactory<\Database\Factories\QRCodeFactory> */
    use HasFactory;

    protected $fillable = [
        'event_id',
        'attendee_id',
        'qrcode_data', // kombinasi antara code yang dimiliki attendee dengan id events, contoh: event=10 code=520 maka 10520 atau 52010 (tetapi nanti untuk code akan di randomize)
        'valid_until'
    ];

    public function event() {
        return $this->belongsTo(Event::class);
    }

    public function attendee() {
        return $this->belongsTo(Attendee::class);
    }
}
