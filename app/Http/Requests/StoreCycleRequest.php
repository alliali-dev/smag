<?php

namespace App\Http\Requests;

use App\Models\Cycle;
use Illuminate\Foundation\Http\FormRequest;

class StoreCycleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // dd(request()->all());
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
            "annee" => ["required"],
            "ecole" => ["required"],
            "libelle" => ["required"],
        ];
    }
}
