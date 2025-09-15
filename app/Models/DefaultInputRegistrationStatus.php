<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DefaultInputRegistrationStatus extends Model
{
    use SoftDeletes;

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
