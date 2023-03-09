<?php

namespace App\Enum;

enum BookingStatusEnum:string{
    case Created = 'created';
    case Completed = 'completed';
    case Cancelled = 'cancelled';
}
