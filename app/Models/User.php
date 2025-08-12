<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
        'phone_number'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function logs()
    {
        return $this->hasMany(UserLog::class);
    }

    public function eventAdminAssigned()
    {
        return $this->belongsToMany(Event::class, 'event_admins', 'user_id', 'event_id')->withTimestamps();
    }

    public function activeEvents()
    {
        return $this->belongsToMany(Event::class, 'event_admins', 'user_id', 'event_id')
            ->where('status', 'active')->orderBy('start_date', 'asc')
            ->withTimestamps();
    }

    public function doneEvents() {
        return $this->belongsToMany(Event::class, 'event_admins', 'user_id', 'event_id')
            ->where('status', 'done')->orderBy('start_date', 'asc')
            ->withTimestamps();
    }

    public function ongoingEvents()
    {
        return $this->belongsToMany(Event::class, 'event_admins', 'user_id', 'event_id')
            ->whereDate('start_date', '<=', now())
            ->whereDate('end_date', '>=', now()) 
            ->withTimestamps();
        }

    public function createdEvents()
    {
        return $this->hasMany(Event::class);
    }
}
