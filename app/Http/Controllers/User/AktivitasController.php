<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use Illuminate\Http\Request;

class AktivitasController extends Controller
{
    public function index()
    {
        $bookings = Booking::with([
            'subServices.providerService.category'
        ])
        ->where(
            'customer_id',
            Auth::id()
        )
        ->whereNotIn('status', [
            'completed',
            'cancelled',
            'rejected'
        ])
        ->latest()
        ->get();

        return view(
            'user.aktifitas.aktifitas',
            compact('bookings')
        );
    }

    public function show(Booking $booking)
    {
        $booking->load([
            'provider',
            'subServices.providerService.category',
            'diagnosis.produks',
            'diagnosis.damageReports'
        ]);

        return view(
            'user.aktifitas.detail-aktifitas',
            compact('booking')
        );
    }

    public function approveEstimation(
        Request $request,
        Booking $booking
    )
    {
        $request->validate([
            'produk_ids' => 'array'
        ]);

        $diagnosis =
            $booking->diagnosis;
            

        // reset semua pilihan

        $diagnosis->produks()
            ->updateExistingPivot(
                $diagnosis->produks
                    ->pluck('id')
                    ->toArray(),
                [
                    'is_selected' => false
                ]
            );

        // tandai yg dipilih

        if(
            $request->filled(
                'produk_ids'
            )
        ){

            foreach(
                $request->produk_ids
                as $produkId
            ){

                $diagnosis->produks()
                    ->updateExistingPivot(
                        $produkId,
                        [
                            'is_selected' => true
                        ]
                    );

            }

        }

        $booking->update([
    'status' => 'approved'
]);

        return back()->with(
            'success',
            'Estimasi disetujui'
        );
    }

  public function rejectEstimation(
        Booking $booking
    )
    {
        $booking->update([
            'status' => 'rejected'
        ]);

        return redirect()
            ->route('riwayat')
            ->with(
                'success',
                'Estimasi berhasil ditolak'
            );
    }

    public function payBooking(Booking $booking)
    {
        $booking->update([
            'status' => 'completed'
        ]);

        return back()->with(
            'success',
            'Pembayaran berhasil'
        );
    }

    public function riwayat()
    {
        $bookings = Booking::with([
            'subServices.providerService.category'
        ])
        ->where(
            'customer_id',
            Auth::id()
        )
        ->whereIn('status', [
            'completed',
            'cancelled',
            'rejected'
        ])
        ->latest()
        ->get();
       

        return view(
            'user.aktifitas.riwayat',
            compact('bookings')
        );
    }

 
}