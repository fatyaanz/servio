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

        $diagnosis
            ->produks()
            ->detach(
                $produkId
            );

        return back();
    }
}