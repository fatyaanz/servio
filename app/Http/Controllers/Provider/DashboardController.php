<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $totalOrders = Booking::count();

        $activeOrders = Booking::whereNotIn(
            'status',
            [
                'completed',
                'cancelled',
                'rejected'
            ]
        )->count();

        $completedOrders = Booking::where(
            'status',
            'completed'
        )->count();

        $failedOrders = Booking::whereIn(
            'status',
            [
                'cancelled',
                'rejected'
            ]
        )->count();

        $pendingBookings = Booking::with([
            'customer',
            'subServices'
        ])
        ->where('status', 'pending')
        ->latest()
        ->take(5)
        ->get();

        $activeBookings = Booking::with([
            'customer',
            'subServices'
        ])
        ->whereNotIn(
            'status',
            [
                'pending',
                'completed',
                'cancelled',
                'rejected'
            ]
        )
        ->latest()
        ->take(5)
        ->get();

        return view(
            'provider.pages.Dashboard.dashboard',
            compact(
                'totalOrders',
                'activeOrders',
                'completedOrders',
                'failedOrders',
                'pendingBookings',
                'activeBookings'
            )
        );
    }
}