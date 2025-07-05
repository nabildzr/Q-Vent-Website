<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QRCodeLog extends Model
{
    /** @use HasFactory<\Database\Factories\QRCodeLogFactory> */
    use HasFactory;

    protected $fillable = [
        'qr_code_id',
        'attendee_id',
        'user_id',
        'status',   
    ];
}
