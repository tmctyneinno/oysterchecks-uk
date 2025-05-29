<?php

namespace App\Services;

use App\Models\Otp;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EmailService
{


    public function sendOtp($email, $otpCode)
    {
        $data = [
            'otp' => $otpCode,
            'expires_at' => Carbon::now()->addMinutes(10)->format('H:i:s'),
        ];

        Log::info('Sending OTP email', [
            'email' => $email,
            'otp' => $otpCode,
            'expires_at' => $data['expires_at']
        ]);

        // $this->send('Your OTP Code', 'emails.otp', $data, $email);
    }



    private function send($topic, $template, $data, $email)
    {
        Mail::send($template, $data, function ($message) use ($email, $topic) {
            $message->to($email)->subject($topic);
            // $message->attach('file.pdf');
            // $message->from('agudatechy022@gmail.com', 'AGUDATECHY');
            $message->from('support@agudatechy.com', 'Oyster Checks UK');
        });
    }
}
