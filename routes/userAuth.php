<?php

use App\Http\Controllers\User\AuthController;
use Illuminate\Support\Facades\Route;


Route::controller(AuthController::class)->prefix('user')->group(function() {
 Route::post('register', 'Register');
 Route::post('login', 'Login');
 Route::post('logout', 'Logout'); 
 Route::post('forgot-password', 'ForgotPassword');
 Route::post('reset-password', 'ResetPassword');
 Route::post('verify-email', 'VerifyEmail');
 Route::post('email/verification-notification', 'EmailVerificationNotification'); 

});
