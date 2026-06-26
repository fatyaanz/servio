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
        'status',
        'damage_description',
        'damage_photo',
        'latitude',
        'longitude',
        'customer_location',
        'payment_proof'
    ];

    protected $casts = [
        'damage_photo' => 'array',
    ];

    public function getFormattedIdAttribute()
    {
        return 'SV-' . str_pad($this->id, 5, '0', STR_PAD_LEFT);
    }

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

    public function review()
    {
        return $this->hasOne(
            Review::class
        );
    }

    public function messages()
    {
        return $this->hasMany(
            Message::class
        );
    }

    public function transaction()
    {
        return $this->hasOne(
            Transaction::class
        );
    }
}