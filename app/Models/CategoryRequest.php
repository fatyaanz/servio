<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class CategoryRequest extends Model
{
    protected $fillable = [
        'provider_id',
        'category_id',
        'certificate_file',
        'status',
        'rejection_reason'
    ];

    public function provider()
    {
        return $this->belongsTo(
            User::class,
            'provider_id'
        );
    }

    public function category()
    {
        return $this->belongsTo(
            Category::class,
            'category_id'
        );
    }
}
