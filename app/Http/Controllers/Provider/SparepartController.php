<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class SparepartController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required',
            'sparepart_id' => 'required',
            'qty' => 'required|integer|min:1'
        ]);

        $booking =
            Booking::with('diagnosis')
            ->findOrFail(
                $request->booking_id
            );

        $booking
            ->diagnosis
            ->spareparts()
            ->attach(
                $request->sparepart_id,
                [
                    'qty' => $request->qty
                ]
            );

        return back();
    }

    public function destroy(
        $diagnosisId,
        $sparepartId
    )
    {
        $diagnosis =
            \App\Models\Diagnosis::findOrFail(
                $diagnosisId
            );

        $diagnosis
            ->spareparts()
            ->detach(
                $sparepartId
            );

        return back();
    }
}