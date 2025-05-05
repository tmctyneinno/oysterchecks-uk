<?php 

namespace App\Interface;

interface AuthInterface 
{
    public function RegisterUser($requestDto);
    public function LoginUser($requestDto);
}