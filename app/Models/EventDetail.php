<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventDetail extends Model
{
    /** @use HasFactory<\Database\Factories\EventDetailFactory> */
    use HasFactory;

    protected $fillable = [
        'event_id',
        'participant_count',
        'registration_link',
        'is_virtual',
        'platform_url',
        'agenda',

    ];

    public function event() {
        return $this->belongsTo(Event::class);
    }
}
