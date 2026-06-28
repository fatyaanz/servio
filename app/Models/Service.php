<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\ProviderService;

class Service extends Model
{
    protected $fillable = [
        'name',
        'description',
        'icon'
    ];

    public function providers()
    {
        return $this->hasMany(ProviderService::class);
    }
}