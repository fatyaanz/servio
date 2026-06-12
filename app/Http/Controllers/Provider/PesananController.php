<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Sparepart;
use App\Models\Produk;
use App\Models\Diagnosis;

class PesananController extends Controller
{
    public function show($id)
    {
        $booking = Booking::with([
            'customer',
            'subServices',
            'diagnosis.damageReports',
            'diagnosis.produks'
        ])->findOrFail($id);

        $produks = Produk::all();

        return view(
            'provider.pages.pesanan.detail-pesanan',
            compact(
                'booking',
                'produks'
            )
        );
    }

    public function index()
    {
        $bookings = Booking::with([
            'customer',
            'subServices'
        ])
        ->whereNotIn(
            'status',
            [
                'completed',
                'cancelled',
                'rejected'
            ]
        )
        ->latest()
        ->get();
        $activeCount = $bookings->count();

        return view(
            'provider.pages.pesanan.pesanan',
            compact('bookings')
        );
    }

    public function accept($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update([
            'status' => 'accepted'
        ]);

        return back();
    }

    public function reject($id)
{
    $booking = Booking::findOrFail($id);

    $booking->update([
        'status' => 'cancelled'
    ]);

    return back()->with(
            'success',
            'Pesanan berhasil ditolak'
        );
    }

    public function startTrip($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update([
            'status' => 'on_the_way'
        ]);

        return back();
    }

    public function arrived($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update([
            'status' => 'diagnosis'
        ]);

       Diagnosis::firstOrCreate(
    [
        'booking_id' => $booking->id
    ],
    [
        'description' => '-',
        'service_fee' => 0,
        'status' => 'draft'
    ]
);

            return back();
    }

    public function startWork($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update([
            'status' => 'working'
        ]);

        return back();
    }

    public function sendEstimation($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update([
            'status' => 'waiting_approval'
        ]);

        return back()->with(
            'success',
            'Estimasi berhasil dikirim'
        );
    }

    public function finishWork($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update([
            'status' => 'payment'
        ]);

        return back()->with(
            'success',
            'Perbaikan selesai'
        );
    }

 public function riwayat()
    {
        $bookings = Booking::with([
            'customer',
            'subServices'
        ])
        ->whereIn(
            'status',
            [
                'completed',
                'cancelled',
                'rejected'
            ]
        )
        ->latest()
        ->get();

        return view(
            'provider.pages.pesanan.riwayat',
            compact('bookings')
        );
    }

}