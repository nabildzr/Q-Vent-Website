<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    /** @use HasFactory<\Database\Factories\AttendanceFactory> */
    use HasFactory;

    protected $fillable = [
        'attendee_id',
        'event_id',
        'status',
        'check_in_time',
        'notes',
    ];

    public function attendance() {
        return $this->belongsTo(Attendee::class);
    }

    public function event() {
        return $this->belongsTo(Event::class);
    }
 }
