<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Notification;
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

        Notification::create([
            'user_id' => $booking->provider_id,
            'title' => 'Estimasi Biaya Disetujui',
            'message' => 'Pelanggan ' . Auth::user()->name . ' menyetujui estimasi biaya untuk pesanan ' . $booking->formatted_id . '. Silakan mulai pengerjaan.',
            'type' => 'status_updated',
            'booking_id' => $booking->id,
            'is_read' => false
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

        Notification::create([
            'user_id' => $booking->provider_id,
            'title' => 'Estimasi Biaya Ditolak',
            'message' => 'Pelanggan ' . Auth::user()->name . ' menolak estimasi biaya untuk pesanan ' . $booking->formatted_id . '.',
            'type' => 'status_updated',
            'booking_id' => $booking->id,
            'is_read' => false
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
        $serviceFee = $booking->diagnosis?->service_fee ?? 0;
        $sparepartTotal = 0;

        foreach ($booking->diagnosis?->produks ?? [] as $produk) {
            if ($produk->pivot->is_selected) {
                $sparepartTotal += $produk->harga * $produk->pivot->qty;
            }
        }

        $appFee = 5000; // Flat Rp5.000 application fee
        $total = $serviceFee + $sparepartTotal + $appFee;

        $customer = Auth::user();
        if ($customer->balance < $total) {
            return back()->with(
                'error',
                'Saldo ServioPay Anda tidak mencukupi (Kurang Rp' . number_format($total - $customer->balance, 0, ',', '.') . '). Silakan isi saldo terlebih dahulu di menu profil.'
            );
        }

        // Process deduction
        $customer->decrement('balance', $total);

        // Credit provider
        $provider = $booking->provider;
        if ($provider) {
            $provider->increment('balance', $serviceFee + $sparepartTotal);
        }

        // Credit admin
        $admin = \App\Models\User::where('role', 'admin')->first();
        if ($admin) {
            $admin->increment('balance', $appFee);
        }

        // Log transaction
        \App\Models\Transaction::create([
            'booking_id' => $booking->id,
            'customer_id' => $customer->id,
            'provider_id' => $booking->provider_id,
            'amount' => $total,
            'service_fee' => $serviceFee + $sparepartTotal,
            'app_fee' => $appFee
        ]);

        $booking->update([
            'status' => 'completed'
        ]);

        Notification::create([
            'user_id' => $booking->provider_id,
            'title' => 'Pembayaran Diterima',
            'message' => 'Pelanggan ' . Auth::user()->name . ' telah membayar sebesar Rp' . number_format($total, 0, ',', '.') . ' untuk pesanan ' . $booking->formatted_id . '.',
            'type' => 'status_updated',
            'booking_id' => $booking->id,
            'is_read' => false
        ]);

        return back()->with(
            'success',
            'Pembayaran sebesar Rp' . number_format($total, 0, ',', '.') . ' menggunakan ServioPay berhasil!'
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

    public function storeReview(Request $request, Booking $booking)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        \App\Models\Review::create([
            'booking_id' => $booking->id,
            'customer_id' => Auth::id(),
            'provider_id' => $booking->provider_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Ulasan berhasil dikirim!');
    }
}