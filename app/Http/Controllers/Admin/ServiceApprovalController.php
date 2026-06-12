<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ProviderService;

class ServiceApprovalController extends Controller
{
    public function approve($id)
    {
        $service = ProviderService::findOrFail($id);

        $service->update([

            'status' => 'approved',

            'approved_at' => now(),

            'reject_reason' => null
        ]);

        return back()->with(
            'success',
            'Penyedia layanan berhasil disetujui'
        );
    }

    public function reject(Request $request,$id)
    {
        $request->validate([
            'reject_reason' => 'required'
        ]);

        $service = ProviderService::findOrFail($id);

        $service->update([

            'status' => 'rejected',

            'reject_reason' =>
            $request->reject_reason
        ]);

        return back()->with(
            'success',
            'Pengajuan berhasil ditolak'
        );
    }
}
