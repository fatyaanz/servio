<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubService;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik
        $totalProvider = User::where('role', 'provider')->count();

        $providerAktif = User::where('role', 'provider')
            ->where('status', 'approved')
            ->count();

        $totalKategori = Category::count();

        $totalSubLayanan = SubService::count();

        $categories = Category::with('providers')
            ->latest()
            ->take(5)
            ->get();

        $latestProviders = User::with('categories')
            ->where('role', 'provider')
            ->latest()
            ->take(5)
            ->get();

        // Approval provider
        $pendingProviders = User::where('role', 'provider')
            ->where('status', 'pending')
            ->latest()
            ->take(5)
            ->get();

        return view(
            'admin.Pages.Dashboard.dashboard',
            compact(
                'totalProvider',
                'providerAktif',
                'totalKategori',
                'totalSubLayanan',
                'latestProviders',
                'pendingProviders',
                'categories'
            )
        );
    }
}