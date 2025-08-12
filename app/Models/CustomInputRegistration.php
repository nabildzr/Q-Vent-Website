<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomInputRegistration extends Model
{
    protected $table = 'custom_input_registration';

    protected $fillable = [
        'event_id',
        'name',
        'type',
        'created_by',
        'updated_by',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
