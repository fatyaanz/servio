<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Diagnosis;
use App\Models\DamageReport;
use Illuminate\Http\Request;

class DamageReportController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,_id',
            'title' => 'required',
            'description' => 'required'
        ]);

        $booking = Booking::findOrFail(
            $request->booking_id
        );

        if ($booking->status !== 'diagnosis') {
            return back()->with('error', 'Kerusakan tidak dapat ditambahkan setelah estimasi dikirim.');
        }

        $diagnosis =
            Diagnosis::firstOrCreate(
                [
                    'booking_id' => $booking->id
                ],
                [
                    'description' => 'Diagnosis awal',
                    'service_fee' => 0,
                    'status' => 'draft'
                ]
            );

        DamageReport::create([
            'diagnosis_id' => $diagnosis->id,
            'title' => $request->title,
            'description' => $request->description
        ]);

        return back()->with(
            'success',
            'Kerusakan berhasil ditambahkan'
        );
    }

    public function destroy($id)
    {
        $damage = DamageReport::findOrFail($id);

        if ($damage->diagnosis->booking->status !== 'diagnosis') {
            return back()->with('error', 'Kerusakan tidak dapat dihapus setelah estimasi dikirim.');
        }

        $damage->delete();

        return back()->with(
            'success',
            'Kerusakan berhasil dihapus'
        );
    }
}