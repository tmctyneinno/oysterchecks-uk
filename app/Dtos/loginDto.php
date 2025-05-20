<?php 

namespace App\Dtos;

class LoginDto extends BaseDto{
    public function __construct(
        public readonly String $email,
        public readonly String $password,
        public readonly ?bool $remember = false,
    ) 
    {
        // $this->validateCredentials();
    } 

    // protected function validateCredentials(): void
    // {
    //     if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
    //         throw new \InvalidArgumentException('Invalid email format');
    //     }

    //     if (strlen($this->password) < 8) {
    //         throw new \InvalidArgumentException('Password must be at least 8 characters');
    //     }
    // }
}