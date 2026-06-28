<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class DamageReport extends Model
{
    protected $fillable = [
        'diagnosis_id',
        'title',
        'description'
    ];

    public function diagnosis()
    {
        return $this->belongsTo(
            Diagnosis::class
        );
    }
}