<?php 

namespace App\Dtos;

class loginDto extends BaseDto{
    public function __construct(
        public readonly String $email,
        public readonly String $password,
        public readonly ?String $remember = null
    )
    {
       
    }
}