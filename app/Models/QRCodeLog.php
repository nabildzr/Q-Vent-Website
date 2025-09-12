<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QRCodeLog extends Model
{
    /** @use HasFactory<\Database\Factories\QRCodeLogFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'qr_code_logs';

    protected $fillable = [
        'qr_code_id',
        'attendee_id',
        'user_id',
        'status',
    ];

    public function qrCode()
    {
        return $this->belongsTo(QRCode::class);
    }

    public function attendee()
    {
        return $this->belongsTo(Attendee::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
