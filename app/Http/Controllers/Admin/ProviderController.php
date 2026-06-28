<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;

class ProviderController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status', 'approved');

        $providers = User::where('role', 'provider')->with(['categories', 'providerReviews']);

        if ($status == 'approved') {
            $providers->where('status', 'active');
        }

        if ($status == 'pending') {
            $providers->where('status', 'pending');
        }

        if ($status == 'suspended') {
            $providers->where('status', 'suspended');
        }

        $providers = $providers->paginate(10);

        $pendingProviders = User::where('role', 'provider')
            ->where('status', 'pending')
            ->get();

        // =========================
        // CARD STATISTICS
        // =========================

        $totalProviders = User::where('role', 'provider')
            ->count();

        $activeCount = User::where('role', 'provider')
            ->where('status', 'active')
            ->count();

        $pendingCount = User::where('role', 'provider')
            ->where('status', 'pending')
            ->count();

        $suspendedCount = User::where('role', 'provider')
            ->where('status', 'suspended')
            ->count();

        return view(
            'admin.Pages.Kelola_Penyedia_Layanan.providers',
            compact(
                'providers',
                'pendingProviders',
                'totalProviders',
                'activeCount',
                'pendingCount',
                'suspendedCount'
            )
        );
    }

    public function approve($id)
    {
        $provider = User::findOrFail($id);

        $provider->status = 'active';

        $provider->save();

        return back()->with(
            'success',
            'Provider berhasil diapprove'
        );
    }

    public function reject(Request $request, $id)
    {
        $request->validate([
            'reason' => 'required'
        ]);

        $provider = User::findOrFail($id);

        $provider->status = 'rejected';

        $provider->rejection_reason = $request->reason;

        $provider->save();

        return back()->with(
            'success',
            'Provider berhasil ditolak'
        );
    }

    public function show($id)
    {
        $provider = User::findOrFail($id);

        return view(
            'admin.Pages.Kelola_Penyedia_Layanan.component.detail',
            compact('provider')
        );
    }
}