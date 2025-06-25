<?php

use App\Http\Controllers\User\ClientsVerificationController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function () {

    // Route::prefix('clients')->group(function () {});

    Route::get('checks/resources', [ClientsVerificationController::class, 'getChecksResources']);
    Route::get('checks', [ClientsVerificationController::class, 'checks']);
    Route::post('client/verify', [ClientsVerificationController::class, 'verify']);
    Route::get('client/addresses/{client_id}', [ClientsVerificationController::class, 'getClientAddresses']);
    Route::apiResource('clients', ClientsVerificationController::class);
});
