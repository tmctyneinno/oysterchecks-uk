<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Interface\AuthInterface;
use App\Dtos\RegisterDto;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(
        public readonly AuthInterface $authService
    )
    {
        
    }
    
    public function Register(RegisterRequest $request)
    {

        $requestDto = RegisterDto::fromRequest($request->validated());
        $data = $this->authService->Register;

    }
}
