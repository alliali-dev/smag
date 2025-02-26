<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class OneYear implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //un an
        $d = substr($value, 0, 4);
        $f = substr($value, -4);
        if (($f - $d) != 1) {
            $fail('validation.1an')->translate();
        }
    }
}
