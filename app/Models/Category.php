<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'icon',
        'is_active'
    ];

    public function providers()
    {
        return $this->belongsToMany(
            User::class,
            'category_user'
        );
    }
}