<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use App\Models\SubService;

class ProviderService extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider_id',
        'category_id',
        'status',
        'reject_reason',
        'approved_at'
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

    public function subServices()
    {
        return $this->hasMany(
            SubService::class,
            'provider_service_id'
        );
    }
}