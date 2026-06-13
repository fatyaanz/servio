<?php

namespace App\Http\Controllers\User;

use App\Models\Category;
use App\Models\User;
use App\Models\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where(
            'is_active',
            true
        )->get();

        $providers = User::where('role', 'provider')
            ->where('status', 'active')
            ->with(['providerServices.category', 'providerServices.subServices'])
            ->take(6)
            ->get();

        $activeBooking = null;
        if (auth()->check()) {
            $activeBooking = Booking::where('customer_id', auth()->id())
                ->whereNotIn('status', ['completed', 'cancelled', 'rejected'])
                ->latest()
                ->first();
        }

        return view(
            'user.home.home',
            compact('categories', 'providers', 'activeBooking')
        );
    }

    public function updateLocation(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'address' => 'nullable|string',
            'city' => 'nullable|string'
        ]);

        $user = auth()->user();
        if ($user) {
            $user->update([
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'address' => $request->address ?? $user->address,
                'city' => $request->city ?? $user->city,
            ]);
        }

        return response()->json(['success' => true]);
    }
}
