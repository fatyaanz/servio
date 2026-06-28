<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function updateLocation(Request $request)
    {
        $request->validate([
            'latitude' => 'nullable|string',
            'longitude' => 'nullable|string',
            'city' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        $user = $request->user();
        
        if ($request->has('latitude')) $user->latitude = $request->latitude;
        if ($request->has('longitude')) $user->longitude = $request->longitude;
        if ($request->has('city')) $user->city = $request->city;
        if ($request->has('address')) $user->address = $request->address;
        
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Location updated successfully',
            'data' => $user
        ]);
    }
}
