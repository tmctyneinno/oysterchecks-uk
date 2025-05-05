<?php

use App\Http\Controllers\User\AuthController;
use Illuminate\Support\Facades\Route;


Route::controller(AuthController::class)->prefix('user')->group(function() {
 Route::post('register', 'Login');
});
