<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\sandbox;
use App\Models\{BvnVerification, NinVerification, Verification, NipVerification, Wallet, PvcVerification, NdlVerification, ImageVerification, BankVerification, PhoneVerification};

class IdentityIndexController extends Controller
{
    use sandbox;
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 
    public function __invoke(Request $request)
    {
        $user = auth()->user();
        $data['slug'] = 'Identity';
        $data['success'] = 'success';
        $data['failed'] = 'failed';
        $data['pending'] = 'Pending';
        $data['user'] = $user;
        return view('users.identity.index', $data);
    }


   
}
