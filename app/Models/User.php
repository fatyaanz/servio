<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
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
        'latitude',
        'longitude',
        'warranty',
        'description',
        'experience',

        'ktp_file',
        'business_photo',
        'business_certificate',

        'role',
        'status',
        'balance',
        'is_online',
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
        'balance' => 'decimal:2',
    ];

    public function createToken(string $name, array $abilities = ['*'], \DateTimeInterface $expiresAt = null)
    {
        $plainTextToken = \Illuminate\Support\Str::random(40);

        $token = $this->tokens()->create([
            'name' => $name,
            'token' => hash('sha256', $plainTextToken),
            'abilities' => $abilities,
            'expires_at' => $expiresAt,
        ]);

        return new class($token, $plainTextToken) {
            public $accessToken;
            public $plainTextToken;
            public function __construct($token, $plainTextToken) {
                $this->accessToken = $token;
                $this->plainTextToken = $token->getKey().'|'.$plainTextToken;
            }
        };
    }

    public function sentMessages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function receivedMessages()
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'user_id');
    }

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

    public function providerReviews()
    {
        return $this->hasMany(
            Review::class,
            'provider_id'
        );
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function addresses()
    {
        return $this->hasMany(UserAddress::class, 'user_id');
    }

    public function vouchers()
    {
        return $this->belongsToMany(Voucher::class, 'user_vouchers')
            ->withPivot('is_used')
            ->withTimestamps();
    }

    public function customerReviews()
    {
        return $this->hasMany(
            Review::class,
            'customer_id'
        );
    }

    public function averageResponseTime()
    {
        $bookings = Booking::where('provider_id', $this->id)
            ->where('status', '!=', 'pending')
            ->get();

        if ($bookings->isEmpty()) {
            return '± 5 Menit';
        }

        $totalMinutes = 0;
        $validBookingsCount = 0;
        foreach ($bookings as $booking) {
            $created = $booking->created_at;
            $updated = $booking->updated_at;
            if ($created && $updated) {
                $totalMinutes += $created->diffInMinutes($updated);
                $validBookingsCount++;
            }
        }

        if ($validBookingsCount === 0) {
            return '± 5 Menit';
        }

        $avgMinutes = $totalMinutes / $validBookingsCount;

        $avgMinutes = (int) $avgMinutes;
        if ($avgMinutes < 1) {
            return 'Cepat (± 1 Menit)';
        } elseif ($avgMinutes < 60) {
            return '± ' . $avgMinutes . ' Menit';
        } else {
            $hours = round($avgMinutes / 60, 1);
            return '± ' . $hours . ' Jam';
        }
    }

    public function distanceTo($other)
    {
        if (!$this->latitude || !$this->longitude || !$other->latitude || !$other->longitude) {
            return null;
        }

        $earthRadius = 6371; // Earth's radius in kilometers

        $latFrom = deg2rad((double) $this->latitude);
        $lonFrom = deg2rad((double) $this->longitude);
        $latTo = deg2rad((double) $other->latitude);
        $lonTo = deg2rad((double) $other->longitude);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
            cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
            
        return $angle * $earthRadius;
    }
}
