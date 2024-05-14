<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Letter implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(preg_match("/^[a-zA-Z\s()]+$/",$value) != 1)
        {
            $fail(ucfirst(preg_replace('/[0-9]+/', '', $attribute))." must contain only letters.");
        }
    }
}
