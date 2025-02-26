<?php

namespace App\Http\Requests;

use App\Models\Etablissement;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEtablissementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $ecoles = Etablissement::select("id", "created_by")
            ->where('created_by', '=', auth()->user()->id)->get();
        return   count($ecoles) > 0 ?  true :  false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'nom' => ['required', 'string', 'max:255'],
            'telephone' => ["required", "regex:/^\+[0-9]{1,3}?\s[0-9]{10}$/"],
            "adresse" => ['required', 'string', 'max:255'],
            "statut" => ['required', 'string', 'max:255'],
            "code" => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255',],
            "ville" => ['nullable', 'string', 'max:255'],
            "localisation" => ['required', 'string', 'max:255'],
        ];
    }
}
