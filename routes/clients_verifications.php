<?php

use App\Http\Controllers\User\ClientsVerificationController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function () {

    // Route::prefix('clients')->group(function () {
    //     Route::get('/all', [ClientsVerificationController::class, 'allClients']);
    //     Route::post('/new', [ClientsVerificationController::class, 'createClient']);
    //     Route::get('/{id}', [ClientsVerificationController::class, 'clientDetails']);
    //     // Route::post('/update/{id}', [ClientsVerificationController::class, 'updateClient']);
    //     // Route::post('/delete/{id}', [ClientsVerificationController::class, 'deleteClient']);
    //     Route::get('/resources', [ClientsVerificationController::class, 'getChecksResources']);

    // });

    Route::get('checks/resources', [ClientsVerificationController::class, 'getChecksResources']);
    Route::get('checks', [ClientsVerificationController::class, 'checks']);
    Route::post('client/verify', [ClientsVerificationController::class, 'verify']);
    Route::apiResource('clients', ClientsVerificationController::class);
});
