<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Interface\AuthInterface;
use App\Dtos\LoginDto;
use App\Dtos\RegisterDto;
use App\Enums\OTP_TYPE;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use App\Services\OtpService;
use App\Services\EmailService;

class AuthController extends Controller
{
    protected $otpService;
    protected $emailService;

    public function __construct(public readonly AuthInterface $authService, OtpService $otpService, EmailService $emailService)
    {
        $this->otpService = $otpService;
        $this->emailService = $emailService;
    }



    // sent OTP
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users|max:255',
            'phone' => 'nullable|string'
        ]);

        $email = $request->email;
        $phone = $request->phone;
        $otp = $this->otpService->generateOtp($email, $phone, OTP_TYPE::REGISTER);

        try {
            $this->emailService->sendOtp($email, $otp);
            return response()->json(['message' => 'OTP sent successfully.'], 200);
        } catch (\Exception $e) {
            Log::error('Error sending OTP', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Failed to send OTP.'], 500);
        }
    }

    // verify OTP
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'otp_code' => 'required|string'
        ]);

        $email = $request->email;
        $phone = $request->phone;
        $otpCode = $request->otp_code;

        if ($this->otpService->verifyOtp($email, $phone, $otpCode)) {
            return response()->json(['message' => 'OTP verified successfully.'], 200);
        }

        return response()->json(['message' => 'Invalid or expired OTP.'], 400);
    }





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
