<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventRegistrationLink extends Model
{
    /** @use HasFactory<\Database\Factories\EventRegistrationLinkFactory> */
    use HasFactory, SoftDeletes;

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
