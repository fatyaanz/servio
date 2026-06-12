<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Diagnosis;

class ProviderController extends Controller
{
    public function show($id)
    {
        $provider = User::findOrFail($id);

        return view(
            'user.provider.detail-provider',
            compact('provider')
        );
    }
}