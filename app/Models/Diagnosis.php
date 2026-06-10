<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Produk;

class Diagnosis extends Model
{
    protected $fillable = [
        'booking_id',
        'description',
        'service_fee',
        'status'
    ];

    public function booking()
    {
        return $this->belongsTo(
            Booking::class
        );
    }

    public function produks()
    {
        return $this->belongsToMany(
            Produk::class,
            'diagnosis_produks'
        )
        ->withPivot(
            'qty',
            'is_selected'
        )
        ->withTimestamps();
    }
    public function damageReports()
    {
        return $this->hasMany(
            DamageReport::class
        );
    }

}