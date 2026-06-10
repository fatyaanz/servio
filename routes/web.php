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
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::post(
    '/provider/profile/update',
    [ProfileController::class, 'updateProvider']
)->name('provider.profile.update');

/*Landing Page*/
Route::get('/', function () {
    return view('landing.landingpage');
});

/*Auth*/
Route::get('/register', function () {
    return view('auth.register-provider');
})->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.store');

Route::view('/login', 'auth.login')->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.store');

Route::get('/register-customer', function () {
    return view('auth.register');
})->name('customer.register');

Route::post(
    '/register-customer',
    [AuthController::class, 'registerCustomer']
)->name('customer.register.store');

/*Admin Routes*/
Route::get('/admin/profile', function () {
    return view('admin.Profile.profile');
})->name('admin.profile');

Route::get('/admin/profile', [ProfileController::class, 'index'])
    ->name('admin.profile');

Route::post('/admin/profile/update', [ProfileController::class, 'update'])
    ->name('admin.profile.update');

Route::get(
    '/admin/dashboard',
    [DashboardController::class, 'index']
)->middleware(['auth', 'admin'])
 ->name('admin.dashboard');

Route::post(
    '/take-service',
    [ProviderServiceController::class,'takeService']
);

Route::prefix('admin')->group(function () {

    Route::post(
        '/approve-service/{id}',
        [ServiceApprovalController::class,'approve']
    );

    Route::post(
        '/reject-service/{id}',
        [ServiceApprovalController::class,'reject']
    );

});

Route::get(
    '/admin/providers',
    [ProviderController::class,'index']
);

Route::get(
    '/admin/providers/{id}',
    [ProviderController::class,'show']
)->name('admin.providers.show');

Route::put(
    '/admin/providers/{id}/approve',
    [ProviderController::class, 'approve']
)->name('admin.providers.approve');

Route::view(
    '/admin/chat/chat',
    'admin.Pages.chat.chat'
)->name(
    'admin.Pages.chat.chat'
);

Route::put(
    '/admin/providers/{id}/reject',
    [ProviderController::class,'reject']
)->name('admin.providers.reject');

Route::prefix('admin')->group(function () {

    Route::get(
        '/Kategori_Layanan/categories',
        [CategoryController::class,'index']
    )->name('categories.index');

    Route::post(
        '/Kategori_Layanan/store',
        [CategoryController::class,'store']
    )->name('categories.store');

    Route::get('/categories/{id}/edit',
        [CategoryController::class, 'edit'])
        ->name('categories.edit');

    Route::put('/categories/{id}',
        [CategoryController::class, 'update'])
        ->name('categories.update');

    Route::put(
        '/category-request/{id}/approve',
        [CategoryController::class,'approveRequest']
    )->name('categories.approve');

    Route::put(
        '/category-request/{id}/reject',
        [CategoryController::class,'rejectRequest']
    )->name('categories.reject');

});

/*Provider Routes*/    
Route::view(
    '/provider/Dashboard/dashboard',
    'provider.pages.Dashboard.dashboard'
)->middleware(['auth', 'provider'])
 ->name('provider.Dashboard.dashboard');

Route::view(
    '/provider/chat/chat',
    'provider.pages.chat.chat'
);

Route::get(
    '/provider/layanan/layanan',
    [ProviderServiceController::class, 'layanan']
)->name('provider.layanan');

Route::prefix('provider')->group(function () {

    Route::get(
        '/produk',
        [ProdukController::class,'index']
    );

    Route::post(
        '/produk/store',
        [ProdukController::class,'store']
    );

    Route::put(
        '/produk/update/{id}',
        [ProdukController::class,'update']
    );

    Route::delete(
        '/produk/delete/{id}',
        [ProdukController::class,'destroy']
    );

});

Route::get(
    '/provider/pesanan',
    [PesananController::class, 'index']
)->name('provider.pesanan');

Route::post(
    '/provider/booking/{id}/accept',
    [PesananController::class, 'accept']
)->name('provider.booking.accept');

Route::post(
    '/provider/booking/{id}/reject',
    [PesananController::class, 'reject']
)->name('provider.booking.reject');

Route::get(
    '/Kategori_Layanan/{category}/providers',
    [CategoryController::class,'providers']
)->name('categories.providers');

Route::delete(
    '/Kategori_Layanan/{category}/provider/{provider}',
    [CategoryController::class,'removeProvider']
)->name('categories.remove-provider');

Route::post(
    '/provider/profile/update',
    [ProfileController::class, 'updateProvider']
)->name('provider.profile.update');



Route::post(
    '/provider/category-request',
    [ProviderServiceController::class, 'submitCategory']
)->name('provider.category.submit');

Route::middleware(['auth'])->group(function () {

    Route::post(
        '/provider/category-request',
        [ProviderServiceController::class, 'submitCategory']
    )->name('provider.category.submit');

});

Route::post(
    '/sub-service/store',
    [ProviderServiceController::class,'storeSubService']
)->name('provider.subservice.store');

Route::prefix('provider')->group(function () {

    Route::put(
        '/sub-service/{id}',
        [ProviderServiceController::class,'updateSubService']
    )->name('provider.subservice.update');

    Route::delete(
        '/sub-service/{id}',
        [ProviderServiceController::class,'deleteSubService']
    )->name('provider.subservice.delete');

});


Route::get('/landingpage', function () {
    return view('landing.landingpage');
})->name('landingpage');


Route::put(
    '/provider/subservice/{id}',
    [ProviderServiceController::class,'updateSubService']
)->name('provider.subservice.update');

Route::delete(
    '/provider/subservice/{id}',
    [ProviderServiceController::class,'deleteSubService']
)->name('provider.subservice.delete');

Route::get(
    '/provider/service/{id}/subservices',
    [ProviderServiceController::class,'getSubServices']
)->name(
    'provider.subservices'
);

##BARUUUU UNTUK USER

Route::get('/register-provider', function () {
    return view('auth.register-provider');
})->name('provider.register');
Route::get('/register-customer', function () {
    return view('auth.register');
})->name('customer.register');

Route::get('/choose-role', function () {
    return view('auth.choose-role');
});

Route::get(
    '/aktifitas',
    [AktivitasController::class, 'index']
)->name('aktifitas');

Route::get('/chat', function () {
    return view('user.chat.chat');
})->name('chat');

Route::get('/profile', function () {
    return view('user.profile.profile');
})->name('profile');

Route::get(
    '/layanan',
    [LayananController::class, 'index']
)->name('layanan');

Route::get(
    '/provider-detail/{id}',
    [UserProviderController::class, 'show']
)->name('provider.detail');

Route::get(
    '/pilih-layanan/{id}',
    [SubLayananController::class, 'index']
)->name('pilih.layanan');

Route::get('/diagnosis', function () {
    return view('user.diagnosis.diagnosis-form');
})->name('diagnosis.form');
Route::get('/diagnosis-result', function () {
    return view('user.diagnosis.diagnosis-result');
})->name('diagnosis.result');

Route::get(
    '/booking-normal',
    [BookingController::class, 'index']
)->name('booking.normal');

Route::post(
    '/booking/store',
    [BookingController::class, 'store']
)->name('booking.store');

Route::get('/booking-diagnosis', function () {
    return view('user.booking.booking-diagnosis');
})->name('booking.diagnosis');

Route::get('/booking-success', function () {
    return view('user.booking.booking-success');
})->name('booking.success');


Route::get('/riwayat', function () {
    return view('user.aktifitas.riwayat');
})->name('riwayat');
Route::get('/riwayat', function () {
    return view('user.aktifitas.riwayat');
})->name('riwayat');

Route::get(
    '/detail-aktifitas/{booking}',
    [AktivitasController::class, 'show']
)->name('detail.aktifitas');

Route::get('/chat', function () {
    return view('user.chat.chat');
})->name('chat');

Route::get('/detail-chat', function () {
    return view('user.chat.detail-chat');
})->name('detail.chat');

Route::get('/profile', function () {
    return view('user.profile.profile');
})->name('profile');

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


Route::get(
    '/beranda',
    [HomeController::class, 'index']
)->middleware(['auth', 'customer'])
 ->name('home');


//pesanan


Route::get(
    '/provider/detail-pesanan/{id}',
    [PesananController::class, 'show']
)->name('provider.detail-pesanan');

/*Route::get(
    '/provider/pesanan/riwayat',
    function () {
        return view('provider.pages.pesanan.riwayat');
    }
)->name('provider.pesanan.riwayat');*/

Route::get(
    '/provider/pesanan/riwayat',
    [PesananController::class, 'riwayat']
)->name('provider.pesanan.riwayat');


//track order
Route::post(
    '/provider/damage-report/store',
    [DamageReportController::class, 'store']
)->name('provider.damage.store');

Route::post(
    '/provider/booking/{id}/start-trip',
    [PesananController::class, 'startTrip']
)->name('provider.booking.start-trip');

Route::post(
    '/provider/booking/{id}/arrived',
    [PesananController::class, 'arrived']
)->name('provider.booking.arrived');

Route::delete(
    '/provider/damage-report/{id}',
    [DamageReportController::class, 'destroy']
)->name('provider.damage.destroy');

// Route::post(
//     '/provider/sparepart/store',
//     [SparepartController::class, 'store']
// )->name('provider.sparepart.store');

// Route::delete(
//     '/provider/sparepart/{diagnosis}/{sparepart}',
//     [SparepartController::class, 'destroy']
// )->name('provider.sparepart.destroy');

Route::post(
    '/provider/diagnosis-produk/store',
    [DiagnosisProdukController::class, 'store']
)->name('provider.diagnosis-produk.store');

Route::delete(
    '/provider/diagnosis-produk/{diagnosis}/{produk}',
    [DiagnosisProdukController::class, 'destroy']
)->name('provider.diagnosis-produk.destroy');

Route::post(
    '/provider/diagnosis-produk/store',
    [DiagnosisProdukController::class, 'store']
);

Route::post(
    '/provider/diagnosis-produk/store',
    [DiagnosisProdukController::class,'store']
)->name('provider.diagnosis-produk.store');

Route::post(
    '/provider/diagnosis/service-fee',
    [DiagnosisController::class, 'updateServiceFee']
)->name('provider.diagnosis.service-fee');



Route::post(
    '/provider/diagnosis/service-fee',
    [DiagnosisController::class, 'updateServiceFee']
)->name('provider.diagnosis.service-fee');

Route::post(
    '/provider/booking/{id}/send-estimation',
    [PesananController::class,'sendEstimation']
)->name(
    'provider.booking.send-estimation'
);

Route::post(
    '/booking/{booking}/approve-estimation',
    [AktivitasController::class, 'approveEstimation']
)->name('booking.approve.estimation');

Route::post(
    '/booking/{booking}/reject-estimation',
    [AktivitasController::class, 'rejectEstimation']
)->name('booking.reject.estimation');

Route::post(
    '/booking/{id}/start-work',
    [PesananController::class, 'startWork']
)->name('provider.booking.start-work');

Route::post(
    '/provider/booking/{id}/finish-work',
    [PesananController::class, 'finishWork']
)->name('provider.booking.finish-work');

Route::post(
    '/booking/{booking}/pay',
    [AktivitasController::class, 'payBooking']
)->name('booking.pay');

Route::get(
    '/riwayat',
    [AktivitasController::class, 'riwayat']
)->name('riwayat');

Route::get(
    '/provider/riwayat',
    [PesananController::class, 'riwayat']
)->name('provider.riwayat');



Route::get(
    '/provider/dashboard',
    [ProviderDashboardController::class, 'index']
)->name('provider.dashboard');