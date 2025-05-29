<?php

namespace App\Services;

use App\Models\Otp;
use Carbon\Carbon;

class OtpService
{
    protected $otpExpirationMinutes = 5; // OTP valid for 5 minutes

    public function generateOtp($email, $phone = null)
    {
        // Delete any existing OTPs for this identifier
        Otp::where('email', $email)->delete();

        // Generate random 6-digit OTP
        $otpCode = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);

        // Create new OTP record
        Otp::create([
            'email' => $email,
            'phone' => $phone,
            'otp_code' => $otpCode,
            'expires_at' => Carbon::now()->addMinutes($this->otpExpirationMinutes)
        ]);

        return $otpCode;
    }

    public function verifyOtp($email, $phone, $otpCode)
    {
        $otp = Otp::where('email', $email)
            ->where('otp_code', $otpCode)
            ->where('is_used', false)
            ->where('expires_at', '>', now())
            ->first();

        if ($otp) {
            $otp->update(['is_used' => true]);
            return true;
        }

        return false;
    }
}
