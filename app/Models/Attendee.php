<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    /** @use HasFactory<\Database\Factories\AttendeeFactory> */
    use HasFactory;

    protected $fillable = [
        'event_id',
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'code'
    ];

    public function event() {
        return $this->belongsTo(Event::class);
    }

    public function attendance() {
        return $this->hasOne(Attendance::class);
    }

    public function qrcode() {
        return $this->hasOne(QRCode::class);
    }
}
