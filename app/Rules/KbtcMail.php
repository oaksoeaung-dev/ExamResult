<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Str;

class KbtcMail implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(Str::of($value)->after("@") != "kbtc.edu.mm")
        {
            $fail("You must use the email address provided by KBTC.");
        }
    }
}
