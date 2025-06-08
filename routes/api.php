<?php

use App\Http\Controllers\User\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


require __DIR__ . '/userAuth.php';
require __DIR__ . '/clients_verifications.php';
Route::post('debug-test', function (Request $request) {
    return response()->json(['status' => 'logged']);
});
