<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    } 
 
   
    public function rules(): array
    { 
        return [
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8|max:128',
            'remember' => 'nullable|boolean',
        ];
    }
}
