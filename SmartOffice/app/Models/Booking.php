<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'start_date',
        'end_date',
        'booking_date',
        'booking_status',
    ];

    protected $hidden = [
        'id',
        'room_id',
        'user_id',
    ];

    protected $casts = [
        'status' => \App\Enum\BookingStatusEnum::class,
    ];
}
