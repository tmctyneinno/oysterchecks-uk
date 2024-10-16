<?php

namespace App\Http\Controllers;


use App\Models\Verification;
use App\Traits\sandbox;

class AddressController extends Controller
{

  use sandbox;

    public function __construct()
    {
      return $this->middleware('clients');
    }
  //

  public function AddressIndex($slug)
  {

    $slug = Verification::where(['slug' => $slug])->first();
    $data['slug'] = $slug;
    return view('users.address.index', $data);
  }

  public function showCreateCandidate($slug)
  {
    $slug = Verification::where(['slug' => $slug])->first();
    $data['slug'] = $slug;
    return view('users.address.create', $data);
  }


}
