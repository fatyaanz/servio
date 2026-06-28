<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;

class ProviderApiController extends Controller
{
    /**
     * Get providers by category ID
     */
    public function getByCategory(Request $request, $categoryId)
    {
        $user = $request->user();

        // Check if category exists
        $category = Category::find($categoryId);
        if (!$category) {
            return response()->json([
                'status' => 'error',
                'message' => 'Category not found'
            ], 404);
        }

        // Get providers offering services in this category
        $providers = User::where('role', 'provider')
            ->where('status', 'active')
            ->whereHas('providerServices', function ($q) use ($categoryId) {
                $q->where('category_id', $categoryId);
            })
            ->with(['providerReviews'])
            ->get();

        $this->appendProviderData($providers, $user);

        return response()->json([
            'status' => 'success',
            'data' => $providers
        ]);
    }

    /**
     * Get provider details including services and subservices
     */
    public function show(Request $request, $providerId)
    {
        $user = $request->user();

        $provider = User::where('role', 'provider')
            ->where('_id', $providerId)
            ->with([
                'providerServices.category',
                'providerServices.subServices',
                'providerReviews.customer'
            ])
            ->first();

        if (!$provider) {
            return response()->json([
                'status' => 'error',
                'message' => 'Provider not found'
            ], 404);
        }

        // Append calculated fields (rating, distance, etc)
        $reviews = $provider->providerReviews;
        $provider->average_rating = $reviews->avg('rating') ?? 0;
        $provider->review_count = $reviews->count();
        $provider->avg_response_time = $provider->averageResponseTime();
        
        if ($user) {
            $distance = $provider->distanceTo($user);
            $provider->distance_km = $distance !== null ? round($distance, 1) : null;
        } else {
            $provider->distance_km = null;
        }

        return response()->json([
            'status' => 'success',
            'data' => $provider
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
