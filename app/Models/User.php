<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\ProviderService;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',

        'address',
        'city',

        'ktp_file',
        'business_photo',
        'business_certificate',

        'role',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'category_user'
        );
    }

    public function providerServices()
        {
            return $this->hasMany(
                ProviderService::class,
                'provider_id'
            );
        }

    public function customerBookings()
        {
            return $this->hasMany(
                Booking::class,
                'customer_id'
            );
        }

        public function providerBookings()
        {
            return $this->hasMany(
                Booking::class,
                'provider_id'
            );
}
}
