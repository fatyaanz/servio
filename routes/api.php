<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\ProviderApiController;
use App\Http\Controllers\Api\BookingApiController;
use App\Http\Controllers\Api\AiDiagnosisApiController;
use App\Http\Controllers\Api\ChatApiController;

Route::prefix('v1')->group(function () {
    // Auth Routes
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    // Protected Routes
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        
        Route::get('/home', [HomeController::class, 'index']);
        Route::get('/notifications', [\App\Http\Controllers\Api\NotificationController::class, 'index']);
        Route::post('/user/location', [\App\Http\Controllers\Api\UserController::class, 'updateLocation']);

        Route::get('/user', function (Request $request) {
            return response()->json([
                'status' => 'success',
                'data' => $request->user()
            ]);
        });
        
        // Providers & Services
        Route::get('/categories/{category}/providers', [ProviderApiController::class, 'getByCategory']);
        Route::get('/providers/{provider}', [ProviderApiController::class, 'show']);
        
        // Bookings
        Route::post('/bookings', [BookingApiController::class, 'store']);
        Route::get('/user/bookings', [BookingApiController::class, 'index']); // active and history
        Route::get('/user/bookings/{booking}', [BookingApiController::class, 'show']);
        
        // Booking Actions
        Route::post('/user/bookings/{booking}/cancel', [BookingApiController::class, 'cancel']);
        Route::post('/user/bookings/{booking}/approve', [BookingApiController::class, 'approveEstimation']);
        Route::post('/user/bookings/{booking}/payment', [BookingApiController::class, 'uploadPayment']);
        
        // AI Diagnosis
        Route::post('/diagnosis/analyze', [AiDiagnosisApiController::class, 'analyze']);

        // Chat Routes
        Route::get('/user/chats', [ChatApiController::class, 'index']);
        Route::get('/user/chats/{otherId}', [ChatApiController::class, 'show']);
        Route::post('/user/chats/{otherId}/messages', [ChatApiController::class, 'store']);
    });
});
