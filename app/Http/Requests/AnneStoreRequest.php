<?php

namespace App\Http\Requests;

use App\Rules\OneYear;
use Illuminate\Foundation\Http\FormRequest;

class AnneStoreRequest extends FormRequest
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
            //
            'datedebut' => ['required', 'date', 'before:datefin'],
            'datefin' => ['required', 'date', 'after:datedebut'],
            'libelle' => ['required', 'unique:annee_academiques', new OneYear],
        ];
    }
}
