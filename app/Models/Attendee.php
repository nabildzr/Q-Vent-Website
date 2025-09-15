<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendee extends Model
{
    /** @use HasFactory<\Database\Factories\AttendeeFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'event_id',
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'code',
        'input_document',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function attendance()
    {
        return $this->hasOne(Attendance::class);
    }

    public function qrcode()
    {
        return $this->hasOne(QRCode::class);
    }

    public function qrCodeLogs()
    {
        return $this->hasMany(QRCodeLog::class);
    }

    public function customInputs()
    {
        return $this->hasMany(CustomInputRegistrationValue::class, 'attendee_id');
    }
}
