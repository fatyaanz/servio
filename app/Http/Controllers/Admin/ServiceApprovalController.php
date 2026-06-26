<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ProviderService;
use App\Models\Notification;

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

        // Notify provider
        Notification::create([
            'user_id' => $service->provider_id,
            'title' => 'Layanan Disetujui',
            'message' => 'Layanan kategori "' . ($service->category ? $service->category->name : 'Unknown') . '" Anda telah disetujui oleh admin.',
            'type' => 'service_approved',
            'is_read' => false
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

        // Notify provider
        Notification::create([
            'user_id' => $service->provider_id,
            'title' => 'Layanan Ditolak',
            'message' => 'Layanan kategori "' . ($service->category ? $service->category->name : 'Unknown') . '" Anda ditolak. Alasan: ' . $request->reject_reason,
            'type' => 'service_rejected',
            'is_read' => false
        ]);

        return back()->with(
            'success',
            'Pengajuan berhasil ditolak'
        );
    }
}
