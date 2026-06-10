<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\SubService;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'provider_id',
        'address',
        'location_note',
        'booking_date',
        'booking_time',
        'notes',
        'status'
    ];

    public function customer()
    {
        return $this->belongsTo(
            User::class,
            'customer_id'
        );
    }

    public function provider()
    {
        return $this->belongsTo(
            User::class,
            'provider_id'
        );
    }

    public function subServices()
    {
        return $this->belongsToMany(
            SubService::class,
            'booking_sub_services'
        );
    }
    public function diagnosis()
    {
        return $this->hasOne(
            Diagnosis::class
        );
    }

    public function damageReports()
    {
        return $this->hasMany(
            DamageReport::class
        );
    }
}