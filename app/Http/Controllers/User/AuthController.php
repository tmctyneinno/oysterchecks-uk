<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Interface\AuthInterface;
use App\Dtos\LoginDto;
use App\Dtos\RegisterDto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function __construct(public readonly AuthInterface $authService) {}


    public function Register(RegisterRequest $request)
    {
        Log::info('Register method hit');
        Log::info('Registration attempt', $request->all());
        try {
            $validatedData = $request->validated();
            Log::info('Validated data', $validatedData);

            $requestDto = RegisterDto::fromRequest($validatedData);
            Log::info('DTO created', (array) $requestDto);

            $result = $this->authService->Register($requestDto);
            Log::info('Registration result', $result);

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


        [$email, $password] = explode('oystercheck', $decrypted);

        return response()->json(['email' => $email, 'password' => $password], 200);

        // $detached = explode('oystercheck', $validated['c']);

        // $email = base64_decode($detached[0], true);
        // $password = base64_decode($detached[1], true);

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = User::where('email', $email)->first();
            return response()->json(['token' => $user->createToken('API')->plainTextToken]);
        }

        return response()->json([
            'message' => 'Invalid credentials'
        ], 401);
    }







    public function Loginxxxxx(LoginRequest $request)
    {
        Log::info('Login attempt', ['email' => $request->email, 'ip' => $request->ip()]);

        try {
            $validatedData = $request->validated();
            $dto = new LoginDto(...$validatedData);

            $loginResult = $this->authService->LoginUser($dto);

            if (!$loginResult) {
                Log::warning('Failed login attempt', ['email' => $request->email]);
                return response()->json([
                    'message' => 'Invalid credentials'
                ], 401);
            }
            Log::info('User logged in', ['email' => $request->email]);
            return response()->json([
                'access_token' => $loginResult['access_token'],
                'token_type' => 'Bearer',
                'user' => $loginResult['user'],
            ]);
        } catch (\Exception $e) {
            Log::error('Login error: ' . $e->getMessage());
            return response()->json([
                'message' => 'Login failed',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }
}
