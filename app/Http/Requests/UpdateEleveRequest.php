<?php

namespace App\Http\Requests;

use App\Rules\Photo;
use App\Models\Eleve;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEleveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $owner = Eleve::where('created_by', '=', auth()->user()->id)->get();
        // dd($owner);
        if (count($owner) == 0) {
            return 0;
        } else {
            return 1;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => ['required', 'string', 'min:2', 'max:30'],
            'prenoms' => ['required', 'string', 'min:2', 'max:40'],
            'datenais' => ['required', 'date'],
            'lieunais' => ['required', 'string', 'min:2', 'max:60'],
            'sexe' => ['required', 'string', 'min:1', 'max:10'],
            'nationnalite' => ['required', 'string', 'min:2', 'max:60'],
            'matricule' => ['regex:/^[0-9]{8}?[A-Z]{1}$/'],
            'redoublant' => ['required', 'string'],
            'regime' => ['required', 'string'],
            'affecte' => ['required', 'string'],
            'photo' => ['required', 'extensions:jpg,png,jpeg'],
            'classe' => ['required'],
        ];
    }
}