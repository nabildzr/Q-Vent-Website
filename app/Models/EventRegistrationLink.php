<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventRegistrationLink extends Model
{
    /** @use HasFactory<\Database\Factories\EventRegistrationLinkFactory> */
    use HasFactory;

    protected $fillable = [
        'event_id',
        'status',
        'link',
        'valid_until',
    ];

    public function event() {
        return $this->belongsTo(Event::class);
    }
}
