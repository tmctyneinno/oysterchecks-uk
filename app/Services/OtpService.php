<?php

namespace App\Services;

use App\Enums\OTP_TYPE;
use App\Models\Otp;
use Carbon\Carbon;

class OtpService
{
    protected $otpExpirationMinutes = 5; // OTP valid for 5 minutes

    public function generateOtp($email, $phone, OTP_TYPE $otp_type)
    {
        // Delete any existing OTPs for this email
        Otp::where('email', $email)->delete();

        // Generate random 6-digit OTP
        $otpCode = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);

        // Create new OTP record
        Otp::create([
            'email' => $email,
            'phone' => $phone,
            'otp_code' => $otpCode,
            'otp_type' => $otp_type->value,
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
