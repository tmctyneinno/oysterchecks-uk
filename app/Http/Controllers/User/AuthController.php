<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Interface\AuthInterface;
use App\Dtos\LoginDto;
use App\Dtos\RegisterDto;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function __construct(public readonly AuthInterface $authService) {}


    public function Register(RegisterRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $requestDto = RegisterDto::fromRequest($validatedData);

            $result = $this->authService->Register($requestDto);

            return response()->json($result, 201);
        } catch (\Exception $e) {
            Log::error('Registration failed', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Registration failed. Please try again later.'], 500);
        }
    }


    public function login(Request $request)
    {
        $validated = $request->validate([
            'c' => 'required|string',
            'iv' => 'required|string',
            't' => 'required|numeric',
        ]);

        $ciphertext = base64_decode($validated['c']);
        $iv = base64_decode($validated['iv']);
        $key = env('AES_SECRET_KEY');

        $decrypted = openssl_decrypt($ciphertext, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
       
        return  $decrypted;
        [$email, $password] = explode('oystercheck', $decrypted);

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = User::where('email', $email)->first();
            $user->last_login = Carbon::now();
            $user->save();
            return response()->json(['token' => $user->createToken('API')->plainTextToken]);
        }

        return response()->json([
            'message' => 'Invalid credentials, try again.'
        ], 401);
    }


    public function profile(Request $request)
    {
        $user = User::find($request->user()->id);
        return response()->json($user, 200);
    }
}
