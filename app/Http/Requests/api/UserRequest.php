<?php

namespace App\Http\Requests\api;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class UserRequest extends FormRequest
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
    public function rules()
    {
        // $validator = Validator::make($request->all(), [
        return [
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
        // ]);
        // if ($validator->fails()) {
        //     return response()->json(["errors" => $validator->errors()], 401);
        // }
    }
}