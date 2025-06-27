<?php

use App\Http\Controllers\User\ClientsController;
use App\Http\Controllers\User\ChecksController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function () {

    // Route::prefix('clients')->group(function () {});

    Route::get('checks/resources', [ChecksController::class, 'getChecksResources']);
    Route::get('checks', [ChecksController::class, 'checks']);
    Route::post('client/verify', [ChecksController::class, 'verify']);

    Route::get('client/addresses/{client_id}', [ClientsController::class, 'getClientAddresses']);
    Route::delete('client/addresses/{addressId}', [ClientsController::class, 'deleteAddress']);
    Route::apiResource('clients', ClientsController::class);
});
