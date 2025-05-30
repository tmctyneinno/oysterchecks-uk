<?php


namespace App\Enums;

enum OTP_TYPE: string
{
    case REGISTER = 'register';
    case LOGIN = 'login';
    case FORGOT_PASSWORD = 'forgot_password';
    case RESET_EMAIL = 'reset_email';


    // public function label(): string
    // {
    //     return match ($this) {
    //         self::EMAIL => 'Email',
    //         self::PHONE => 'Phone',
    //         self::BOTH => 'Both',
    //     };
    // }


    // Usage example:
    // $otpType = OTPTYPES::EMAIL;  
    // echo $otpType->label(); // Outputs: Email

}
