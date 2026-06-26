<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Provider\ProdukController;
use App\Http\Controllers\Admin\ServiceApprovalController;
use App\Http\Controllers\Provider\ProviderServiceController;
use App\Http\Controllers\Admin\ProviderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\LayananController;
use App\Http\Controllers\User\ProviderController as UserProviderController;
use App\Http\Controllers\User\SubLayananController;
use App\Http\Controllers\User\BookingController;
use App\Http\Controllers\User\AktivitasController;
use App\Http\Controllers\Provider\PesananController;
use App\Http\Controllers\Provider\DamageReportController;
use App\Http\Controllers\Provider\DiagnosisProdukController;
use App\Http\Controllers\Provider\DiagnosisController;
use App\Http\Controllers\Provider\DashboardController as ProviderDashboardController;
use App\Http\Controllers\AiDiagnosisController;
use App\Http\Controllers\UserDiagnosisController;
use App\Http\Controllers\ChatController;

/*
|--------------------------------------------------------------------------
| Public Routes (No Auth Required)
|--------------------------------------------------------------------------
*/

// Landing Page
Route::get('/', function () {
    return view('landing.landingpage');
});

Route::get('/landingpage', function () {
    return view('landing.landingpage');
})->name('landingpage');

Route::get('/choose-role', function () {
    return view('auth.choose-role');
});

// Auth
Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');

Route::get('/register', function () {
    return view('auth.register-provider');
})->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

Route::get('/register-provider', function () {
    return view('auth.register-provider');
})->name('provider.register');

Route::get('/register-customer', function () {
    return view('auth.register');
})->name('customer.register');
Route::post('/register-customer', [AuthController::class, 'registerCustomer'])->name('customer.register.store');

// AI Diagnosis (public)
Route::get('/diagnosis', function () {
    return view('user.diagnosis.diagnosis-form');
})->name('diagnosis.form');

Route::post('/diagnosis/proses', [AiDiagnosisController::class, 'diagnose'])->name('diagnosis.proses');

Route::post('/diagnosis/analyze', [UserDiagnosisController::class, 'analyze'])->name('diagnosis.analyze');

Route::get('/diagnosis-result', function () {
    return view('user.diagnosis.diagnosis-result');
})->name('diagnosis.result');

Route::get('/test-gemini', [AiDiagnosisController::class, 'testGemini']);

// Semi-public browsing routes
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');
Route::get('/provider-detail/{id}', [UserProviderController::class, 'show'])->name('provider.detail');
Route::get('/pilih-layanan/{id}', [SubLayananController::class, 'index'])->name('pilih.layanan');

// Public category
Route::get('/Kategori_Layanan/{category}/providers', [CategoryController::class, 'providers'])->name('categories.providers');

/*
|--------------------------------------------------------------------------
| Admin Routes (Auth + Admin Middleware)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/revenue', [DashboardController::class, 'revenue'])->name('admin.revenue');

    Route::get('/admin/profile', [ProfileController::class, 'index'])->name('admin.profile');
    Route::post('/admin/profile/update', [ProfileController::class, 'update'])->name('admin.profile.update');

    Route::get('/admin/chat/chat', [ChatController::class, 'adminIndex'])->name('admin.Pages.chat.chat');

    Route::get('/admin/providers', [ProviderController::class, 'index']);
    Route::get('/admin/providers/{id}', [ProviderController::class, 'show'])->name('admin.providers.show');
    Route::put('/admin/providers/{id}/approve', [ProviderController::class, 'approve'])->name('admin.providers.approve');
    Route::put('/admin/providers/{id}/reject', [ProviderController::class, 'reject'])->name('admin.providers.reject');

    Route::post('/admin/approve-service/{id}', [ServiceApprovalController::class, 'approve']);
    Route::post('/admin/reject-service/{id}', [ServiceApprovalController::class, 'reject']);

    Route::get('/admin/Kategori_Layanan/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/admin/Kategori_Layanan/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/admin/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/admin/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::put('/admin/category-request/{id}/approve', [CategoryController::class, 'approveRequest'])->name('categories.approve');
    Route::put('/admin/category-request/{id}/reject', [CategoryController::class, 'rejectRequest'])->name('categories.reject');
    Route::delete('/Kategori_Layanan/{category}/provider/{provider}', [CategoryController::class, 'removeProvider'])->name('categories.remove-provider');

});

/*
|--------------------------------------------------------------------------
| Provider Routes (Auth + Provider Middleware)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'provider'])->group(function () {

    // ── Dashboard ────────────────────────────────────────────────────────
    // Both URLs resolve to same controller; the uppercase one is the canonical entry
    Route::get('/provider/Dashboard/dashboard', [ProviderDashboardController::class, 'index'])
        ->name('provider.Dashboard.dashboard');
    Route::get('/provider/dashboard', [ProviderDashboardController::class, 'index'])
        ->name('provider.dashboard');

    // ── Chat ─────────────────────────────────────────────────────────────
    Route::get('/provider/chat/chat', [ChatController::class, 'providerIndex'])
        ->name('provider.chat');

    // ── Pesanan (Orders) ──────────────────────────────────────────────────
    Route::get('/provider/pesanan', [PesananController::class, 'index'])
        ->name('provider.pesanan');
    Route::get('/provider/pesanan/riwayat', [PesananController::class, 'riwayat'])
        ->name('provider.pesanan.riwayat');
    Route::get('/provider/riwayat', [PesananController::class, 'riwayat'])
        ->name('provider.riwayat');
    Route::get('/provider/detail-pesanan/{id}', [PesananController::class, 'show'])
        ->name('provider.detail-pesanan');

    Route::post('/provider/booking/{id}/accept', [PesananController::class, 'accept'])
        ->name('provider.booking.accept');
    Route::post('/provider/booking/{id}/reject', [PesananController::class, 'reject'])
        ->name('provider.booking.reject');
    Route::post('/provider/booking/{id}/start-trip', [PesananController::class, 'startTrip'])
        ->name('provider.booking.start-trip');
    Route::post('/provider/booking/{id}/arrived', [PesananController::class, 'arrived'])
        ->name('provider.booking.arrived');
    Route::post('/booking/{id}/start-work', [PesananController::class, 'startWork'])
        ->name('provider.booking.start-work');
    Route::post('/provider/booking/{id}/send-estimation', [PesananController::class, 'sendEstimation'])
        ->name('provider.booking.send-estimation');
    Route::post('/provider/booking/{id}/finish-work', [PesananController::class, 'finishWork'])
        ->name('provider.booking.finish-work');
    Route::post('/provider/booking/{id}/confirm-payment', [PesananController::class, 'confirmPayment'])
        ->name('provider.booking.confirm-payment');

    // ── Damage Reports ────────────────────────────────────────────────────
    Route::post('/provider/damage-report/store', [DamageReportController::class, 'store'])
        ->name('provider.damage.store');
    Route::delete('/provider/damage-report/{id}', [DamageReportController::class, 'destroy'])
        ->name('provider.damage.destroy');

    // ── Diagnosis Produk ──────────────────────────────────────────────────
    Route::post('/provider/diagnosis-produk/store', [DiagnosisProdukController::class, 'store'])
        ->name('provider.diagnosis-produk.store');
    Route::delete('/provider/diagnosis-produk/{diagnosis}/{produk}', [DiagnosisProdukController::class, 'destroy'])
        ->name('provider.diagnosis-produk.destroy');

    // ── Diagnosis ─────────────────────────────────────────────────────────
    Route::post('/provider/diagnosis/service-fee', [DiagnosisController::class, 'updateServiceFee'])
        ->name('provider.diagnosis.service-fee');

    // ── Layanan & Sub-Layanan ─────────────────────────────────────────────
    Route::get('/provider/layanan/layanan', [ProviderServiceController::class, 'layanan'])
        ->name('provider.layanan');
    Route::post('/take-service', [ProviderServiceController::class, 'takeService']);
    Route::post('/provider/category-request', [ProviderServiceController::class, 'submitCategory'])
        ->name('provider.category.submit');

    Route::post('/sub-service/store', [ProviderServiceController::class, 'storeSubService'])
        ->name('provider.subservice.store');
    Route::put('/provider/sub-service/{id}', [ProviderServiceController::class, 'updateSubService'])
        ->name('provider.subservice.update');
    Route::delete('/provider/sub-service/{id}', [ProviderServiceController::class, 'deleteSubService'])
        ->name('provider.subservice.delete');
    Route::get('/provider/service/{id}/subservices', [ProviderServiceController::class, 'getSubServices'])
        ->name('provider.subservices');

    // ── Produk ────────────────────────────────────────────────────────────
    Route::get('/provider/produk', [ProdukController::class, 'index']);
    Route::post('/provider/produk/store', [ProdukController::class, 'store']);
    Route::put('/provider/produk/update/{id}', [ProdukController::class, 'update']);
    Route::delete('/provider/produk/delete/{id}', [ProdukController::class, 'destroy']);

    // ── Ulasan Toko ───────────────────────────────────────────────────────
    Route::get('/provider/ulasan', [ProviderDashboardController::class, 'ulasan'])
        ->name('provider.ulasan');

    // ── Transaksi / Keuangan ──────────────────────────────────────────────
    Route::get('/provider/transaksi', [\App\Http\Controllers\Provider\TransaksiController::class, 'index'])
        ->name('provider.transaksi');

    // ── Profile Provider ──────────────────────────────────────────────────
    Route::post('/provider/profile/update', [ProfileController::class, 'updateProvider'])
        ->name('provider.profile.update');

    // ── Notifikasi Provider ──────────────────────────────────────────────
    Route::get('/provider/notifikasi', [\App\Http\Controllers\NotificationController::class, 'providerIndex'])
        ->name('provider.notifikasi');

});

/*
|--------------------------------------------------------------------------
| Customer Routes (Auth Required)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Notifications
    Route::get('/notifications', [\App\Http\Controllers\NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/mark-all-read', [\App\Http\Controllers\NotificationController::class, 'markAllRead'])->name('notifications.markAllRead');

    // Notification API (for AJAX polling)
    Route::get('/notifications/unread', [\App\Http\Controllers\NotificationController::class, 'apiUnread'])->name('notifications.unread');
    Route::post('/notifications/{id}/read', [\App\Http\Controllers\NotificationController::class, 'markRead'])->name('notifications.markRead');
    Route::post('/notifications/mark-all-read-api', [\App\Http\Controllers\NotificationController::class, 'apiMarkAllRead'])->name('notifications.markAllReadApi');

    // Dynamic Role-Based Dashboard Redirect
    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif (auth()->user()->role === 'provider') {
            return redirect()->route('provider.Dashboard.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
    })->name('dashboard');

});

Route::middleware(['auth', 'customer'])->group(function () {

    // Dashboard
    Route::get('/user/dashboard', [AktivitasController::class, 'dashboard'])->name('user.dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'showCustomerProfile'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'updateCustomer'])->name('profile.update');
    // Route::post('/profile/topup', [ProfileController::class, 'topup'])->name('profile.topup');
    Route::post('/profile/delete', [ProfileController::class, 'deleteAccount'])->name('profile.delete');
    Route::post('/profile/preferences', [ProfileController::class, 'updatePreferences'])->name('profile.preferences');
    Route::post('/profile/link-wallet', [ProfileController::class, 'linkWallet'])->name('profile.link-wallet');
    Route::post('/profile/toggle-favorite', [ProfileController::class, 'toggleFavorite'])->name('profile.toggle-favorite');

    // Addresses
    Route::post('/profile/address/store', [ProfileController::class, 'storeAddress'])->name('profile.address.store');
    Route::post('/profile/address/{address}/update', [ProfileController::class, 'updateAddress'])->name('profile.address.update');
    Route::delete('/profile/address/{address}', [ProfileController::class, 'deleteAddress'])->name('profile.address.delete');
    Route::post('/profile/address/{address}/set-primary', [ProfileController::class, 'setPrimaryAddress'])->name('profile.address.set-primary');

    // Location
    Route::post('/update-location', [HomeController::class, 'updateLocation'])->name('user.update-location');

    // Chat
    Route::get('/chat', [ChatController::class, 'customerIndex'])->name('chat');
    Route::get('/chat/detail/{user}', [ChatController::class, 'customerDetail'])->name('chat.detail');
    Route::post('/chat/{user}/send', [ChatController::class, 'sendMessage'])->name('chat.send');

    // Aktivitas / Bookings
    Route::get('/aktifitas', [AktivitasController::class, 'index'])->name('aktifitas');
    Route::get('/riwayat', [AktivitasController::class, 'riwayat'])->name('riwayat');
    Route::get('/detail-aktifitas/{booking}', [AktivitasController::class, 'show'])->name('detail.aktifitas');

    // Booking actions (Customer approves/pays)
    Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
    Route::post('/booking/{booking}/approve-estimation', [AktivitasController::class, 'approveEstimation'])
        ->name('booking.approve.estimation');
    Route::post('/booking/{booking}/reject-estimation', [AktivitasController::class, 'rejectEstimation'])
        ->name('booking.reject.estimation');
    Route::post('/booking/{booking}/pay', [AktivitasController::class, 'payBooking'])
        ->name('booking.pay');
    Route::post('/booking/{booking}/review', [AktivitasController::class, 'storeReview'])
        ->name('booking.review.store');

    // Booking pages
    Route::get('/booking-normal', [BookingController::class, 'index'])->name('booking.normal');
    Route::get('/booking-diagnosis', function () {
        return view('user.booking.booking-diagnosis');
    })->name('booking.diagnosis');
    Route::get('/booking-success', function () {
        return view('user.booking.booking-success');
    })->name('booking.success');

    // Customer home
    Route::get('/beranda', [HomeController::class, 'index'])->name('home');

});

/*
|--------------------------------------------------------------------------
| Misc / Static Pages (legacy stubs)
|--------------------------------------------------------------------------
*/
Route::get('/edit-profile', function () {
    return view('user.profile.edit-profile');
})->name('edit.profile');

Route::get('/alamat-saya', function () {
    return view('user.profile.alamat-saya');
})->name('alamat.saya');

Route::get('/metode-pembayaran', function () {
    return view('user.profile.metode-pembayaran');
})->name('metode.pembayaran');

Route::get('/bantuan', function () {
    return view('user.profile.bantuan');
})->name('bantuan');

Route::get('/tentang-servio', function () {
    return view('user.profile.tentang-servio');
})->name('tentang.servio');
