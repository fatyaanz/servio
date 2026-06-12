<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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