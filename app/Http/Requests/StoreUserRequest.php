<?php

namespace App\Http\Requests;

use Faker\Factory as Faker;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class StoreUserRequest extends FormRequest
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
            'user_tag' => [
                'bail',
                'string',
                'max:255',
                'unique:App\Models\User,user_tag',
            ],
            'username' => [
                'bail',
                'string',
                'max:14',
                'unique:App\Models\User,username',
            ],
            'email' => [
                'bail',
                'string',
                'max:255',
                'unique:App\Models\User,email',
            ],
            'first_name' => [
                'bail',
                'string',
                'required',
                'max:255',
            ],
            'last_name' => [
                'bail',
                'string',
                'required',
                'max:255',
            ],
            'password' => [
                'bail',
                'required',
                'string',
                'min:4',
                'confirmed',
            ],
            'date_of_birth' => [
                'bail',
                'required',
                'date',
                'before:today',
            ],
            'gender' => [
                'bail',
                'required',
                'boolean'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'The :attribute field is required',
            'string' => 'The :attribute field must be a string',
            'unique' => 'The :attribute field already exists',
            'email' => 'The :attribute field must be a valid email address',
            'max' => 'The :attribute field may not be greater than :max characters',
            'min' => 'The :attribute field must be at least :min characters',
            'confirmed' => 'The password confirmation does not match',
            'date' => 'The :attribute field must be a valid date',
            'before' => 'The :attribute field must be a date before today',
        ];
    }
}
