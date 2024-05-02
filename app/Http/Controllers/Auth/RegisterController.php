<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\{Client, User, Wallet};
use App\Traits\GenerateRef;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Events\UserRegistered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers, GenerateRef;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request)
    { 
        $this->validator($request->all())->validate();

       
        $user = $this->createUser($request->all());
        if($user){ 
            event(new UserRegistered($user));
            $userWallet = $this->createWallet($user->id);
            $userClient = $this->createClient($request->only(['company_name']),$user->id);
        }

        if ($userWallet && $userClient) {
            return redirect()->route('register-success');
        }

        return $request->wantsJson() ? new JsonResponse([], 201) : redirect($this->redirectPath());
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required', 'string','alpha-dash', 'max:255'],
            'lname' => ['required', 'string','alpha-dash', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:11', 'unique:users'],
            'company_name' => ['required', 'string', 'max:255'],
            // 'company_email' => ['required', 'string', 'email', 'max:255', 'unique:clients'],
            // 'company_address' => ['required', 'string'],
            'privacy_terms' => ['required', 'accepted'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function createUser(array $data)
    {
         $plainPassword = $this->GeneratePass($data['fname']);
        return User::create([
            'firstname' => $data['fname'],
            'lastname' => $data['lname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            // 'password' => Hash::make($plainPassword),
            'password' => $plainPassword,
            'user_type' => 2
        ]);
    }

    protected function createWallet($userId){
        return Wallet::create(['user_id' => $userId]);
    }

    protected function createClient(array $data, $userId){
        return Client::create([
            'company_name' => $data['company_name'],
            'user_id' => $userId,
        ]);
    }

    public function showRegisterSuccessPage(){
        return view('auth.register-success');
    }
}
