<?php

use App\Http\Controllers\checks\AmlCheckController;
use App\Http\Controllers\checks\DocumentCheckController;
use App\Http\Controllers\checks\IdentityCheckController;
use App\Http\Controllers\checks\MultiBureauCheckController;
use App\Http\Controllers\checks\AddressCheckController;
use App\Http\Controllers\checks\AgeEstimationCheckController;
use App\Http\Controllers\User\ClientsController;
use App\Http\Controllers\User\ChecksDataController;
use App\Http\Controllers\User\ClientAddressesController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function () {


    Route::get('checks/resources', [ChecksDataController::class, 'getChecksResources']);
    Route::get('check/result/{service_reference}', [ChecksDataController::class, 'getCheckResult']);
    Route::get('checks', [ChecksDataController::class, 'checks']);

    Route::prefix('client/verify')->group(function () {
        Route::post('standard_screening_check', [AmlCheckController::class, 'verify']);
        Route::post('extensive_screening_check', [AmlCheckController::class, 'verify']);
        Route::post('multi_bureau_check', [MultiBureauCheckController::class, 'verify']);
        Route::post('document_check', [DocumentCheckController::class, 'verify']);
        Route::post('identity_check', [IdentityCheckController::class, 'verify']);
        Route::post('proof_of_address_check', [AddressCheckController::class, 'verify']);
        Route::post('age_estimation_check', [AgeEstimationCheckController::class, 'verify']);
        // Route::post('enhanced_identity_check', [IdentityCheckController::class, 'verify']);
    });


    Route::apiResource('client/addresses', ClientAddressesController::class);

    Route::apiResource('clients', ClientsController::class);
});
