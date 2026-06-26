<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'title',
        'discount_amount',
        'description',
        'expiry_date'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_vouchers')
            ->withPivot('is_used')
            ->withTimestamps();
    }
}
