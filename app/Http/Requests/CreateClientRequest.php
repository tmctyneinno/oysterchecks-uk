<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateClientRequest extends FormRequest
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
            'type' => ['required', 'string', Rule::in(['person'])],
            'email' => ['required', 'email', 'max:255'],
            'mobile' => ['required', 'string', 'max:20'],
            'telephone' => ['nullable', 'string', 'max:20'],
            'joinedDate' => ['required', 'date', 'date_format:Y-m-d'],

            'personDetails.firstName' => ['required', 'string', 'max:100'],
            'personDetails.lastName' => ['required', 'string', 'max:100'],
            'personDetails.dob' => ['required', 'date', 'date_format:Y-m-d', 'before:today'],
            'personDetails.nationality' => ['required', 'string'],
        ];
    }
}
