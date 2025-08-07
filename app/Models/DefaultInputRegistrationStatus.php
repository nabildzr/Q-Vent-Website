<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DefaultInputRegistrationStatus extends Model
{
    protected $table = 'default_input_registration_status';

    protected $fillable = [
        'event_id',
        'input_document',
        'input_first_name',
        'input_last_name',
        'input_email',
        'input_phone_number',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
