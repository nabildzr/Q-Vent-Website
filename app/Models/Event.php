<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /** @use HasFactory<\Database\Factories\EventFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location',
        'event_category_id',
        'created_by',
        'status',
        'start_date',
        'banner'
    ];

    public function attendees()
    {
        return $this->hasMany(Attendee::class);
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }

    public function admin()
    {
        return $this->hasMany(EventAdmin::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function eventDetail() {
        return $this->hasOne(EventDetail::class);
    }

    public function eventPhotos() {
        return $this->hasMany(EventPhoto::class);
    }

    public function eventRegistrationLink() {
        return $this->hasMany(EventRegistrationLink::class);
    }

    // public function eventCategory() {
    //     return $this->hasOne(EventCategory::class);
    // }
}
