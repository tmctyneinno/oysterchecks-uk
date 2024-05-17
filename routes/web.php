<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdentityController;
use App\Http\Controllers\LandingPages;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IdentityIndexController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CandidatesDocsReviewController as Candidates;
use App\Http\Controllers\ClientProfileController;
use App\Http\Controllers\Admin\{AdminBusinessController, AdminAddressController, AdminClientController, AdminCandidateController, AdminIdentityController, AdminPaymentController, UserController};
use App\Http\Controllers\CustomVerification;
use App\Http\Controllers\SanctionPepController;
use App\Http\Controllers\AdverseMediaController;
use App\Http\Controllers\EmployeeRefController;
use App\Http\Middleware\ClientMiddleware;
use App\Http\Controllers\SumsubController;

// use App\Models\Transaction;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


require __DIR__.'/landing.php';
require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
 
Route::get('/logouts', [HomeController::class, 'Logouts'])->name('logouts');
Route::get('/home', [HomeController::class, 'Home'])->name('home');
Route::get('/fetchInsect', [HomeController::class, 'fetchInsect'])->name('home');


Route::get('/process-sumsub', [SumsubController::class, 'processSumsub']);

#===================== USERS ROUTE ===============================

#===================== USERS ROUTE =============================== 
Route::group(['middleware' => ['clients', 'auth']], function() { 
    Route::get('/getting-started', [HomeController::class, 'gettingStarted'])->name('instructions');
    Route::get('/dashboard', [HomeController::class, 'Home'])->name('index');

    //applicant previous employer routes  
    Route::get('/user/applicant/{slug}', [ApplicantController::class, 'ApplicantIndex'])->name('applicant');
    Route::get('/user/applicant/create/{slug}', [ApplicantController::class, 'ApplicantCreate'])->name('applicant.create');
    Route::post('/user/applicant/store', [ApplicantController::class, 'ApplicantStore'])->name('applicant.store'); 
    Route::get('/user/applicant', [ApplicantController::class, 'Showverify'])->name('applicant.showverify'); 
    Route::get('/user/applicant/details/{id}', [ApplicantController::class, 'ApplicantDetails'])->name('applicant.details');
    Route::get('/user/getapplicant', [ApplicantController::class, 'GetApplicant'])->name('applicant.get'); 


    Route::get('/user/reports', [HomeController::class, 'UserReports'])->name('users.report');
    Route::get('/user/profile', [HomeController::class, 'Profile'])->name('user.profile');
    Route::get('/user/account/activities', [HomeController::class, 'ActivityLog'])->name('client.ActivityLog');
    Route::get('/user/transactions', [HomeController::class, 'UserTransactions'])->name('user.transactions');
    Route::get('/user/activated/account', [HomeController::class, 'AccountActivate'])->name('client.AccountActivate');

    //Verification
    Route::get('/user/identities', IdentityIndexController::class)->name('identityIndex');
    Route::get('/user/identities/details/', [IdentityController::class, 'identityDetails'])->name('verify.details');
    Route::get('/user/identities/check/',[IdentityController::class, 'showIdentityVerificationForm'])->name('showIdentityVerificationForm');
    Route::post('/user/identities/store/',[IdentityController::class, 'store'])->name('storeIdentityVerificationForm');


    //Address Verification
    // Route definition oys_uk
    Route::get('/user/address/verification/{slug}', [AddressController::class,'AddressIndex'])->name('addressIndex');
    Route::get('/user/address/verification/{slug}/candidate/create', [AddressController::class,'showCreateCandidate'])->name('showCreateCandidate');
    Route::get('/user/address/verifications/{slug}', [AddressController::class, 'verificationReport'])->name('showAddressReport');
    Route::post('/user/address/verification/store/{slug}', [AddressController::class,'submitAddressVerify'])->name('AddressStore');
    Route::get('/user/address/verification/{slug}/candidate/{service_ref}', [AddressController::class, 'showVerificationDetailsForm'])->name('showVerificationDetailsForm');
    Route::post('/user/address/verification/candidate/create/{slug}', [AddressController::class,'createCandidate'])->name('createCandidate');

    Route::post('/user/identities/verify/{slug}', [IdentityController::class, 'StoreVerify'])->name('StoreVerify');


    Route::get('user/aml/adversemedia/{slug}',[AdverseMediaController::class, 'AdverseMediaIndex'])->name('user.aml_adverse-media-intelligence');
    Route::get('user/aml/adversemedia/{slug}/check',[AdverseMediaController::class, 'AdverseMediaCheck'])->name('user.aml_adverse_media_check');
    Route::post('user/aml/adversemedia/{slug}/verify',[AdverseMediaController::class, 'AdverseMediaVerify'])->name('user.aml_adverse_media_verify');
    Route::get('user/aml/adversemedia/report/{ref}',[AdverseMediaController::class, 'AdverseMediaGetReport'])->name('user.aml_adverse_media_get_report');

    Route::post('/user/sort/business/data/{name}', [BusinessController::class, 'bizSort'])->name('bizSort');
}); 


