<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Sparepart extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'image'
    ];

    public function diagnoses()
    {
        return $this->belongsToMany(
            Diagnosis::class,
            'diagnosis_spareparts'
        )
        ->withPivot('qty')
        ->withTimestamps();
    }
}