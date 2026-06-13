<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.Profile.profile');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'             => 'required|string|max:255',
            'phone'            => 'nullable|string|max:20',
            'profile_photo'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'current_password' => 'nullable|string',
            'password'         => 'nullable|string|min:8|confirmed',
        ]);

        // Handle photo upload
        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile', 'public');
            $user->profile_photo = $path;
        }

        // Update basic info
        $user->name  = $request->name;
        $user->phone = $request->phone;

        // Change password only if provided
        if ($request->filled('password')) {
            if (!$request->filled('current_password') || !\Hash::check($request->current_password, $user->password)) {
                return back()
                    ->withErrors(['current_password' => 'Password lama tidak sesuai.'])
                    ->withInput();
            }
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return back()->with('success', 'Profil admin berhasil diperbarui.');
    }

    public function updateProvider(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'city' => 'nullable',
            'address' => 'nullable',
            'description' => 'nullable',
            'warranty' => 'nullable',
            'experience' => 'nullable|integer',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')
                ->store('profile', 'public');
            $user->profile_photo = $path;
        }

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->description = $request->description;
        $user->warranty = $request->warranty;
        $user->experience = $request->experience;
        $user->latitude = $request->latitude;
        $user->longitude = $request->longitude;

        $user->save();

        return back()->with(
            'success',
            'Profil berhasil diperbarui'
        );
    }

    public function updateCustomer(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'nullable',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')
                ->store('profile', 'public');
            $user->profile_photo = $path;
        }

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->latitude = $request->latitude;
        $user->longitude = $request->longitude;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return back()->with(
            'success',
            'Profil berhasil diperbarui'
        );
    }

    public function topup(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:10000',
        ]);

        $user = Auth::user();
        $user->increment('balance', $request->amount);

        return back()->with(
            'success',
            'Top up saldo ServioPay sebesar Rp' . number_format($request->amount, 0, ',', '.') . ' berhasil!'
        );
    }
}