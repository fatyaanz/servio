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
                    $_pivot = \App\Helpers\PivotHelper::getDiagnosisProdukPivot($b->diagnosis->id, $p->id);
                    if ($_pivot['is_selected']) {
                        $todayIncome += $p->harga * $_pivot['qty'];
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

        $allReviewsForAvg = \App\Models\Review::where('provider_id', $providerId)->get();
        $averageRating = $allReviewsForAvg->avg('rating') ?? 0;

        // 5. Total Produk
        $totalProduk = \App\Models\Produk::where('provider_id', $providerId)->count();

        // 6. Total Layanan
        $totalLayanan = \App\Models\ProviderService::where('provider_id', $providerId)->count();

        // 7. Chart Data (7 Hari Terakhir)
        $chartLabels = [];
        $chartIncome = [];
        $chartOrders = [];

        // Loop dari 6 hari yang lalu sampai hari ini
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $startOfDay = $date->copy()->startOfDay();
            $endOfDay = $date->copy()->endOfDay();

            // Label format: misal "Senin, 10 Jun" atau cukup nama hari "Senin"
            $chartLabels[] = $date->locale('id')->isoFormat('ddd, D MMM');

            // Pesanan selesai pada hari tersebut
            $completedBookings = Booking::with(['diagnosis.produks'])
                ->where('provider_id', $providerId)
                ->where('status', 'completed')
                ->whereBetween('updated_at', [$startOfDay, $endOfDay])
                ->get();

            $dailyOrders = $completedBookings->count();
            $dailyIncome = 0;

            foreach ($completedBookings as $b) {
                if ($b->diagnosis) {
                    $dailyIncome += $b->diagnosis->service_fee;
                    foreach ($b->diagnosis->produks as $p) {
                        $_pivot = \App\Helpers\PivotHelper::getDiagnosisProdukPivot($b->diagnosis->id, $p->id);
                        if ($_pivot['is_selected']) {
                            $dailyIncome += $p->harga * $_pivot['qty'];
                        }
                    }
                }
            }

            $chartIncome[] = $dailyIncome;
            $chartOrders[] = $dailyOrders;
        }

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
                'averageRating',
                'totalProduk',
                'totalLayanan',
                'chartLabels',
                'chartIncome',
                'chartOrders'
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

    public function toggleStatus()
    {
        $user = auth()->user();
        
        // Treat null as true (online by default) if it's the first time
        if ($user->is_online === null) {
            $user->is_online = true;
        }
        
        $user->is_online = !$user->is_online;
        $user->save();

        return response()->json([
            'success' => true, 
            'is_online' => $user->is_online
        ]);
    }
}