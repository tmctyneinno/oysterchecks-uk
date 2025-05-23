<?php

namespace App\Dtos;

class RegisterDto extends BaseDto
{
    public function __construct(
        public readonly String $email,
        public readonly String $password,
        public readonly String $first_name,
        public readonly String $last_name,
        public readonly String $phone,
        public readonly String $company_name,
    ) {}
}
