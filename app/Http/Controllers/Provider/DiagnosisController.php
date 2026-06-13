<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Diagnosis;


class DiagnosisController extends Controller
{
    public function updateServiceFee(Request $request)
    {
        $request->validate([
            'diagnosis_id' => 'required',
            'service_fee' => 'required|numeric|min:0'
        ]);

        $diagnosis = Diagnosis::findOrFail(
            $request->diagnosis_id
        );

        if ($diagnosis->booking->status !== 'diagnosis') {
            return back()->with('error', 'Biaya jasa tidak dapat diubah setelah estimasi dikirim.');
        }

        $diagnosis->update([
            'service_fee' => $request->service_fee
        ]);

        return back();
    }
}
