<?php

use App\Http\Controllers\User\ClientsVerificationController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->prefix('clients')->group(function () {
    Route::get('/all', [ClientsVerificationController::class, 'allClients']);
    Route::post('/new', [ClientsVerificationController::class, 'createClient']);
    Route::get('/details/{id}', [ClientsVerificationController::class, 'clientDetails']);
    // Route::post('/update/{id}', [ClientsVerificationController::class, 'updateClient']);
    // Route::post('/delete/{id}', [ClientsVerificationController::class, 'deleteClient']);

    Route::post('verify/aml-standard', [ClientsVerificationController::class, 'amlStandard']);
    Route::post('verify/aml-extensive', [ClientsVerificationController::class, 'amlExtensive']);
});
