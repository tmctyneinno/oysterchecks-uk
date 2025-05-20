<?php

namespace App\Interface;

use App\Dtos\RegisterDto; 

interface AuthInterface
{
    
    public function Register($requestDto);
    public function LoginUser($requestDto); 
}