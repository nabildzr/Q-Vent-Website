<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomInputRegistrationValue extends Model
{
    protected $table = 'custom_input_registration_value';

    protected $fillable = [
        'custom_input_id',
        'event_id',
        'attendee_id',
        'name',
        'value',
    ];

    public function customInputRegistration()
    {
        return $this->belongsTo(CustomInputRegistration::class, 'custom_input_registration_id');
    }
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
    public function attendee()
    {
        return $this->belongsTo(Attendee::class, 'attendee_id');
    }
}
