<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Sparepart;
use App\Models\Produk;
use App\Models\Diagnosis;
use App\Models\Notification;

class PesananController extends Controller
{
    public function show($id)
    {
        $booking = Booking::with([
            'customer',
            'subServices',
            'diagnosis.damageReports',
            'diagnosis.produks'
        ])
        ->where('provider_id', auth()->id())
        ->findOrFail($id);

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
        ->where('provider_id', auth()->id())
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

        Notification::create([
            'user_id' => $booking->customer_id,
            'title' => 'Pesanan Diterima',
            'message' => 'Pesanan ' . $booking->formatted_id . ' Anda telah diterima oleh penyedia jasa ' . auth()->user()->name . '.',
            'type' => 'status_updated',
            'booking_id' => $booking->id,
            'is_read' => false
        ]);

        return back();
    }

    public function reject($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update([
            'status' => 'cancelled'
        ]);

        Notification::create([
            'user_id' => $booking->customer_id,
            'title' => 'Pesanan Ditolak',
            'message' => 'Pesanan ' . $booking->formatted_id . ' Anda telah ditolak oleh penyedia jasa.',
            'type' => 'status_updated',
            'booking_id' => $booking->id,
            'is_read' => false
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

        Notification::create([
            'user_id' => $booking->customer_id,
            'title' => 'Penyedia Jasa dalam Perjalanan',
            'message' => 'Penyedia jasa ' . auth()->user()->name . ' sedang menuju ke lokasi Anda.',
            'type' => 'status_updated',
            'booking_id' => $booking->id,
            'is_read' => false
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

        Notification::create([
            'user_id' => $booking->customer_id,
            'title' => 'Penyedia Jasa Telah Sampai',
            'message' => 'Penyedia jasa ' . auth()->user()->name . ' telah sampai di lokasi dan mulai melakukan diagnosa.',
            'type' => 'status_updated',
            'booking_id' => $booking->id,
            'is_read' => false
        ]);

        return back();
    }

    public function startWork($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update([
            'status' => 'working'
        ]);

        Notification::create([
            'user_id' => $booking->customer_id,
            'title' => 'Perbaikan Dimulai',
            'message' => 'Penyedia jasa mulai melakukan pengerjaan/perbaikan pada pesanan ' . $booking->formatted_id . '.',
            'type' => 'status_updated',
            'booking_id' => $booking->id,
            'is_read' => false
        ]);

        return back();
    }

    public function sendEstimation(\Illuminate\Http\Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $location = $request->input('customer_location', 'outside');

        if ($location === 'inside') {
            $booking->update([
                'status' => 'working'
            ]);

            // Auto-approve all recommended spare parts if customer is inside the house
            if ($booking->diagnosis) {
                $productIds = $booking->diagnosis->produks->pluck('id')->toArray();
                if (!empty($productIds)) {
                    $booking->diagnosis->produks()->updateExistingPivot(
                        $productIds,
                        ['is_selected' => true]
                    );
                }
            }

            Notification::create([
                'user_id' => $booking->customer_id,
                'title' => 'Perbaikan Langsung Dimulai',
                'message' => 'Estimasi perbaikan ' . $booking->formatted_id . ' telah disimpan dan pengerjaan langsung dimulai karena Anda berada di lokasi.',
                'type' => 'status_updated',
                'booking_id' => $booking->id,
                'is_read' => false
            ]);

            return back()->with(
                'success',
                'Estimasi disimpan & pekerjaan langsung dimulai.'
            );
        } else {
            $booking->update([
                'status' => 'waiting_approval'
            ]);

            Notification::create([
                'user_id' => $booking->customer_id,
                'title' => 'Estimasi Biaya Dikirim',
                'message' => 'Estimasi biaya untuk perbaikan ' . $booking->formatted_id . ' telah dikirim. Harap periksa dan berikan persetujuan Anda.',
                'type' => 'status_updated',
                'booking_id' => $booking->id,
                'is_read' => false
            ]);

            return back()->with(
                'success',
                'Estimasi berhasil dikirim'
            );
        }
    }

    public function finishWork($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update([
            'status' => 'payment'
        ]);

        Notification::create([
            'user_id' => $booking->customer_id,
            'title' => 'Pekerjaan Selesai & Menunggu Pembayaran',
            'message' => 'Perbaikan pesanan ' . $booking->formatted_id . ' telah selesai. Silakan lakukan pembayaran.',
            'type' => 'status_updated',
            'booking_id' => $booking->id,
            'is_read' => false
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
            'subServices',
            'review'
        ])
        ->where('provider_id', auth()->id())
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