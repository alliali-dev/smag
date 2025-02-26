<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\UploadedFile;

class Photo implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        $extension = substr($value, -4);
        $extension = strtolower($extension);
        // dd(pathinfo(basename($value, 'rw')));
        // dd($value);
        if (!in_array($extension, ['.jpg', '.png', 'jpeg'])) {
            // dd($extension);
            $fail('validation.photo')->translate();
        }
    }
}