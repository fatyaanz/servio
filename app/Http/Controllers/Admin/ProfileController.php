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

        if ($request->hasFile('profile_photo')) {

            $path = $request->file('profile_photo')
                            ->store('profile', 'public');

            $user->profile_photo = $path;
        }

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return back()->with(
            'success',
            'Profil berhasil diperbarui'
        );
    }
    public function updateProvider(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'required',
        'phone' => 'required',
        'city' => 'nullable',
        'address' => 'nullable',
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

    $user->save();

    return back()->with(
        'success',
        'Profil berhasil diperbarui'
    );
}
}