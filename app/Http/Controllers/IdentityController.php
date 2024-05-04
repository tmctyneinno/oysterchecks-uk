<?php

namespace App\Http\Controllers;


use App\Models\FieldInput;
use App\Models\Verification;

class IdentityController extends Controller
{
   
//Constructor
    public function __construct()
    {
         return $this->middleware('clients');
    }

    public function identityIndex($slug)
    {
        $this->RedirectUser();
     
    }

    public function showIdentityVerificationForm($slug)
    {
        $this->RedirectUser();
        $user = auth()->user();

        $slug = Verification::where('slug', $slug)->first();
        $data['slug'] = $slug;
        $data['fields'] = FieldInput::where(['slug' => $slug->slug])->get();
       
        return view('users.individual.identityVerify', $data);
    }



  public function identityDetails(){  
        $user = auth()->user();
        $data['slug'] = 'Identity';
        $data['success'] = 'success';
        $data['failed'] = 'failed';
        $data['pending'] = 'Pending';
        $data['verified'] = 'verified';
        $data['user'] = $user; 
        return view('users.identity.details',$data); 
    }


    public function RedirectUser()
    {
        if (auth()->user()->user_type == 3)
            return redirect()->route('admin.index');
    }
  
}
