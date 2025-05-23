<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Interface\AuthInterface;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthService  implements AuthInterface
{

    public function Register($requestDto)
    {

        $user = User::create([
            'name' => $requestDto->first_name . ' ' . $requestDto->last_name,
            'email' => $requestDto->email,
            'password' => Hash::make($requestDto->password),
            'phone' => $requestDto->phone,
            'company_name' => $requestDto->company_name,
        ]);

        $user->login_ip = request()->ip();
        $user->save();

        return [
            'message' => 'User registered successfully.',
            'user' => $user,
        ];
    }

    public function LoginUser($requestDto)
    {
        Log::info('Attempting to log in user.', ['email' => $requestDto->email]);

        $credentials = [
            'email' => $requestDto->email,
            'password' => $requestDto->password,
        ];

        if (!Auth::attempt($credentials, $requestDto->remember ?? false)) {
            Log::warning('Login failed: Invalid credentials.', ['email' => $requestDto->email]);
            return null;
        }

        $user = Auth::user();
        $user->login_ip = request()->ip();
        $user->save();

        $token = $user->createToken('auth_token' . $user->id)->plainTextToken;
        Log::info('User logged in successfully.', ['user_id' => $user->id, 'email' => $user->email]);
        // return $token;
        return [
            'access_token' => $token,
            'user' => $user,
        ];
    }
}
