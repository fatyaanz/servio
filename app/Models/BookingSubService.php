<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingSubService extends Model
{
    protected $fillable = [
        'booking_id',
        'sub_service_id'
    ];
}