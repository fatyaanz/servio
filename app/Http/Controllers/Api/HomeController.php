<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Booking;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        // 1. Categories
        $categories = Category::where('is_active', true)->get();

        // 2. Active Booking
        $activeBooking = null;
        if ($user) {
            $activeBooking = Booking::where('customer_id', $user->id)
                ->whereNotIn('status', ['completed', 'cancelled', 'rejected'])
                ->with(['provider'])
                ->latest()
                ->first();
        }

        // 3. Providers Base Query
        $baseProviderQuery = User::where('role', 'provider')
            ->where('status', 'active')
            ->where(function ($q) {
                $q->where('is_online', true)->orWhereNull('is_online');
            })
            ->with(['providerServices.category', 'providerServices.subServices', 'providerReviews']);

        // A. Random Providers
        $randomProviders = (clone $baseProviderQuery)->get();
        $randomProviders = $randomProviders->shuffle()->take(5)->values();
        $this->appendProviderData($randomProviders, $user);

        // B. Popular Providers (Sorted by highest rating)
        $popularProviders = (clone $baseProviderQuery)->get();
        $this->appendProviderData($popularProviders, $user);
        $popularProviders = $popularProviders->sortByDesc('average_rating')->take(5)->values();

        // C. Nearest Providers (Sorted by distance)
        $nearestProviders = (clone $baseProviderQuery)->get();
        $this->appendProviderData($nearestProviders, $user);
        $nearestProviders = $nearestProviders->filter(function($p) {
            return $p->distance_km !== null;
        })->sortBy('distance_km')->take(5)->values();
        
        // If nearest is empty (no user location), fallback to random
        if ($nearestProviders->isEmpty()) {
            $nearestProviders = clone $randomProviders;
        }

        return response()->json([
            'categories' => $categories,
            'active_booking' => $activeBooking,
            'providers' => [
                'nearest' => $nearestProviders,
                'popular' => $popularProviders,
                'random' => $randomProviders,
            ]
        ]);
    }
    
    private function appendProviderData($providers, $user)
    {
        $providers->each(function($provider) use ($user) {
            $reviews = $provider->providerReviews;
            $provider->average_rating = $reviews->avg('rating') ?? 0;
            $provider->review_count = $reviews->count();
            
            if ($user) {
                $distance = $provider->distanceTo($user);
                $provider->distance_km = $distance !== null ? round($distance, 1) : null;
            } else {
                $provider->distance_km = null;
            }
        });
    }
}
