<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    /** @use HasFactory<\Database\Factories\UserLogFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'action',
        'ip_address',
        'device_info',
        'status'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
