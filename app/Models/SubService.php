<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubService extends Model
{
    protected $fillable = [
        'provider_service_id',
        'name',
        'price_min',
        'price_max',
        'description'
    ];

    public function providerService()
    {
        return $this->belongsTo(
            ProviderService::class,
            'provider_service_id'
        );
    }

    public function bookings()
    {
        return $this->belongsToMany(
            Booking::class,
            'booking_sub_services'
        );
    }
}
