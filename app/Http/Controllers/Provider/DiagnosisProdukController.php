<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Diagnosis;
use Illuminate\Http\Request;

class DiagnosisProdukController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required',
            'produk_id' => 'required',
            'qty' => 'required|min:1'
        ]);

        $booking = Booking::with(
            'diagnosis'
        )->findOrFail(
            $request->booking_id
        );

        if ($booking->status !== 'diagnosis') {
            return back()->with('error', 'Produk tidak dapat ditambahkan setelah estimasi dikirim.');
        }

        $booking
            ->diagnosis
            ->produks()
            ->syncWithoutDetaching([
                $request->produk_id => [
                    'qty' => $request->qty
                ]
            ]);

        return back();
    }

    public function destroy(
        $diagnosisId,
        $produkId
    )
    {
        $diagnosis =
            Diagnosis::findOrFail(
                $diagnosisId
            );

        if ($diagnosis->booking->status !== 'diagnosis') {
            return back()->with('error', 'Produk tidak dapat dihapus setelah estimasi dikirim.');
        }

        $diagnosis
            ->produks()
            ->detach(
                $produkId
            );

        return back();
    }
}