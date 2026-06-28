<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class SubLayananController extends Controller
{
    public function index($id)
    {
        $provider = User::with(
            'providerServices.subServices'
        )->where(function ($query) {
            $query->where('is_online', true)->orWhereNull('is_online');
        })->findOrFail($id);

        $subServices =
            $provider
            ->providerServices
            ->first()
            ?->subServices ?? collect();

        return view(
            'user.sub-layanan.pilih-layanan',
            compact(
                'provider',
                'subServices'
            )
        );
    }
}