<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Verification;
use App\Models\User;
use App\Models\AdverseMediaCategory;
use App\Models\FieldInput;
use App\Traits\sandbox;

class AdverseMediaController extends Controller
{
    //
    use sandbox;


    public function AdverseMediaIndex($slug)
    {
        $slug = Verification::where('slug', $slug)->first();
        $user = User::where('id', auth()->user()->id)->first();
        $data['slug'] = Verification::where('slug', $slug->slug)->first();
      
        return view('users.aml.adversemedia.index', $data);
    }

    public function AdverseMediaCheck($slug){
        $slug = Verification::where('slug', $slug)->first();
        $data['slug'] = Verification::where('slug', $slug->slug)->first();
        $data['fields'] = FieldInput::where(['slug' => $slug->slug])->get();
        $data['category'] = AdverseMediaCategory::get();
        return view('users.aml.adversemedia.check', $data);
    }

  
     
}
