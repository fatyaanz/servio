<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        $providerId = Auth::id();

        // All transactions where this user is the provider
        $transactions = Transaction::with(['booking.customer'])
            ->where('provider_id', $providerId)
            ->orderByDesc('created_at')
            ->get();

        foreach ($transactions as $trx) {
            if ($trx->booking) {
                $trx->booking->load('subServices');
            }
        }

        // Summary stats
        $totalEarnings  = $transactions->sum('amount');
        $totalServiceFee = $transactions->sum('service_fee');
        $totalOrders    = $transactions->count();
        $thisMonth      = $transactions->filter(function ($t) {
            return $t->created_at->isCurrentMonth();
        })->sum('amount');

        return view('provider.pages.transaksi.transaksi', compact(
            'transactions',
            'totalEarnings',
            'totalServiceFee',
            'totalOrders',
            'thisMonth'
        ));
    }
}
