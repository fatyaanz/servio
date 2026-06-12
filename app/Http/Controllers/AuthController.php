<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'password' => 'required|min:6',

            'address' => 'required',
            'city' => 'required',

            'ktp_file' => 'required|file|mimes:jpg,jpeg,png,pdf',
            'business_photo' => 'required|file|mimes:jpg,jpeg,png',
            'business_certificate' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
        ]);

        // UPLOAD FILE
        $ktp = null;
        $photo = null;
        $certificate = null;

        if ($request->hasFile('ktp_file')) {

            $ktp = $request->file('ktp_file')
                ->store('documents/ktp', 'public');
        }

        if ($request->hasFile('business_photo')) {

            $photo = $request->file('business_photo')
                ->store('documents/business_photo', 'public');
        }

        if ($request->hasFile('business_certificate')) {

            $certificate = $request->file('business_certificate')
                ->store('documents/certificate', 'public');
        }

        $user = User::create([

            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,

            'password' => Hash::make($request->password),

            'address' => $request->address,
            'city' => $request->city,

            'ktp_file' => $ktp,
            'business_photo' => $photo,
            'business_certificate' => $certificate,

            'role' => 'provider',

            // STATUS PENDING
            'status' => 'pending',
        ]);

        return redirect()
        ->route('login')
        ->with(
            'success',
            'Pendaftaran berhasil! Silakan login dalam beberapa saat untuk mengetahui update status verifikasi akun Anda.'
        );
    }

    public function registerCustomer(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,

            'password' => Hash::make($request->password),

            'role' => 'customer',

            'status' => 'active',
        ]);

        return redirect()
            ->route('login')
            ->with(
                'success',
                'Registrasi berhasil! Silakan login.'
            );
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {

        $request->session()->regenerate();

        $user = Auth::user();

        // CEK PENDING
        if ($user->role == 'provider' && $user->status == 'pending') {

            Auth::logout();

            return back()->withErrors([
                'email' => 'Akun Anda masih menunggu persetujuan admin.'
            ]);
        }

        // CEK SUSPENDED
        if ($user->role == 'provider' && $user->status == 'suspended') {

            Auth::logout();

            return back()->withErrors([
                'email' => 'Akun Anda ditangguhkan admin.'
            ]);
        }

        // CEK REJECTED
        if ($user->role == 'provider' && $user->status == 'rejected') {

            Auth::logout();

            return back()->withErrors([
                'email' =>
                    'Registrasi Anda ditolak. Alasan: '
                    . $user->rejection_reason
            ]);
        }

        // REDIRECT
        if ($user->role == 'admin') {

            return redirect()->route('admin.dashboard');

        }

        if ($user->role == 'provider') {

            return redirect()->route('provider.Dashboard.dashboard');

        }

        if ($user->role == 'customer') {

            return redirect()->route('home');

        }
    }

    return back()->withErrors([
        'email' => 'Email atau password salah',
    ]);
}

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}