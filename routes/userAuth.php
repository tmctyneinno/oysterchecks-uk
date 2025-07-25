<?php

use App\Http\Controllers\User\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('sendOtp', [AuthController::class, 'sendOtp']);
    Route::post('verifyOtp', [AuthController::class, 'verifyOtp']);
    Route::post('register', [AuthController::class, 'Register']);
    Route::post('login', [AuthController::class, 'Login']);
    Route::post('logout', [AuthController::class, 'Logout']);
    Route::post('forgot-password', [AuthController::class, 'ForgotPassword']);

    Route::post('verify-email', [AuthController::class, 'VerifyEmail']);
    Route::post('email/verification-notification', [AuthController::class, 'EmailVerificationNotification']);
});


Route::middleware('auth:sanctum')->group(function () {
    Route::get('auth/profile', [AuthController::class, 'Profile']);
    Route::post('auth/profile/update', [AuthController::class, 'ProfileUpdate']);
    Route::post('auth/change/password', [AuthController::class, 'changePassword']);
});
