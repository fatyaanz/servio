<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $providerId = auth()->id();

        // 1. Order Hari Ini (Bookings created today)
        $todayStart = now()->startOfDay();
        $todayEnd = now()->endOfDay();
        $ordersTodayCount = Booking::where('provider_id', $providerId)
            ->whereBetween('created_at', [$todayStart, $todayEnd])
            ->count();

        // Yesterday Comparison
        $yesterdayStart = now()->subDay()->startOfDay();
        $yesterdayEnd = now()->subDay()->endOfDay();
        $ordersYesterdayCount = Booking::where('provider_id', $providerId)
            ->whereBetween('created_at', [$yesterdayStart, $yesterdayEnd])
            ->count();

        $diff = $ordersTodayCount - $ordersYesterdayCount;
        if ($diff > 0) {
            $comparisonText = "📈 {$diff} dari kemarin";
        } elseif ($diff < 0) {
            $absDiff = abs($diff);
            $comparisonText = "📉 {$absDiff} dari kemarin";
        } else {
            $comparisonText = "• sama dengan kemarin";
        }

        // 2. Order Aktif (Not pending, completed, cancelled, rejected)
        $activeOrders = Booking::where('provider_id', $providerId)
            ->whereNotIn('status', [
                'pending',
                'completed',
                'cancelled',
                'rejected'
            ])->count();

        // 3. Menunggu Approval (Pending count)
        $pendingApprovalCount = Booking::where('provider_id', $providerId)
            ->where('status', 'pending')
            ->count();

        // 4. Pendapatan hari ini (Total income from completed bookings today)
        $completedBookingsToday = Booking::with(['diagnosis.produks'])
            ->where('provider_id', $providerId)
            ->where('status', 'completed')
            ->whereBetween('updated_at', [$todayStart, $todayEnd])
            ->get();

        $todayIncome = 0;
        foreach ($completedBookingsToday as $b) {
            if ($b->diagnosis) {
                $todayIncome += $b->diagnosis->service_fee;
                foreach ($b->diagnosis->produks as $p) {
                    if ($p->pivot->is_selected) {
                        $todayIncome += $p->harga * $p->pivot->qty;
                    }
                }
            }
        }

        $pendingBookings = Booking::with([
            'customer',
            'subServices.providerService.category'
        ])
        ->where('provider_id', $providerId)
        ->where('status', 'pending')
        ->latest()
        ->take(5)
        ->get();

        $activeBookings = Booking::with([
            'customer',
            'subServices.providerService.category'
        ])
        ->where('provider_id', $providerId)
        ->whereNotIn('status', [
            'pending',
            'completed',
            'cancelled',
            'rejected'
        ])
        ->latest()
        ->take(5)
        ->get();

        // Filter reviews to the last 24 hours
        $reviews = \App\Models\Review::with(['customer', 'booking.subServices'])
            ->where('provider_id', $providerId)
            ->where('created_at', '>=', now()->subDay())
            ->latest()
            ->get();

        $averageRating = \App\Models\Review::where('provider_id', $providerId)->avg('rating') ?? 0;

        return view(
            'provider.pages.Dashboard.dashboard',
            compact(
                'ordersTodayCount',
                'comparisonText',
                'activeOrders',
                'pendingApprovalCount',
                'todayIncome',
                'pendingBookings',
                'activeBookings',
                'reviews',
                'averageRating'
            )
        );
    }

    public function ulasan()
    {
        $providerId = auth()->id();

        $reviews = \App\Models\Review::with(['customer', 'booking.subServices'])
            ->where('provider_id', $providerId)
            ->latest()
            ->get();

        return view(
            'provider.pages.ulasan.index',
            compact('reviews')
        );
    }
}