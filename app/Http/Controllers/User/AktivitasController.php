<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Notification;
use Illuminate\Http\Request;

class AktivitasController extends Controller
{
    public function dashboard()
    {
        $userId = Auth::id();
        $totalBookings = Booking::where('customer_id', $userId)->count();
        $activeBookingsCount = Booking::where('customer_id', $userId)
            ->whereNotIn('status', ['completed', 'cancelled', 'rejected'])
            ->count();
        $completedBookingsCount = Booking::where('customer_id', $userId)
            ->where('status', 'completed')
            ->count();

        $recentBookings = Booking::with(['subServices.providerService.category', 'provider'])
            ->where('customer_id', $userId)
            ->latest()
            ->take(5)
            ->get();

        return view(
            'user.dashboard.index',
            compact('totalBookings', 'activeBookingsCount', 'completedBookingsCount', 'recentBookings')
        );
    }

    public function index(Request $request)
    {
        $userId = Auth::id();

        $activeBookings = Booking::with([
            'subServices.providerService.category',
            'provider'
        ])
        ->where('customer_id', $userId)
        ->whereNotIn('status', [
            'completed',
            'cancelled',
            'rejected'
        ])
        ->latest()
        ->get();

        $historyBookings = Booking::with([
            'subServices.providerService.category',
            'provider',
            'review',
            'diagnosis.produks'
        ])
        ->where('customer_id', $userId)
        ->whereIn('status', [
            'completed',
            'cancelled',
            'rejected'
        ])
        ->latest()
        ->get();

        $activeTab = $request->query('tab', 'aktif');

        return view(
            'user.aktifitas.aktifitas',
            compact('activeBookings', 'historyBookings', 'activeTab')
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

    public function payBooking(Request $request, Booking $booking)
    {
        $request->validate([
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('payment_proof')) {
            $path = $request->file('payment_proof')->store('payment_proofs', 'public');
            $booking->update([
                'payment_proof' => $path
            ]);

            Notification::create([
                'user_id' => $booking->provider_id,
                'title' => 'Bukti Pembayaran Diunggah',
                'message' => 'Pelanggan ' . Auth::user()->name . ' telah mengunggah bukti pembayaran untuk pesanan ' . $booking->formatted_id . '. Harap verifikasi.',
                'type' => 'status_updated',
                'booking_id' => $booking->id,
                'is_read' => false
            ]);

            return back()->with('success', 'Bukti pembayaran berhasil diunggah. Menunggu konfirmasi dari penyedia jasa.');
        }

        return back()->with('error', 'Gagal mengunggah bukti pembayaran.');
    }

    public function riwayat(Request $request)
    {
        return redirect()->route('aktifitas', ['tab' => 'riwayat']);
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