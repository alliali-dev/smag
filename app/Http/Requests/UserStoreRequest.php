<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => ['required', 'string', 'max:60'],
            'prenoms' => ['required', 'string', 'max:160'],
            'phone' => ["required", "regex:/^\+[0-9]{1,3}?\s[0-9]{10}$/"],
            'avatar' => ["nullable"],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:12', 'max:160', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:12', 'max:160'],
        ];
    }
}