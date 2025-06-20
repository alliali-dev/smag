<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEvaluationRequest extends FormRequest
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
            'annee' => ["required",],
            'periode' => ['required'],
            'classe' => ["required"],
            'prof' => ["required"],
            'discipline' => ["required"],
            'coef_disc' => ["required",],
            'typEv' => ["required", "string"],
            'coef' => ["required",],
        ];
    }
}
