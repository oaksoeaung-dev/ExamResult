<?php

namespace App\Http\Requests;

use App\Rules\KbtcMail;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', new KbtcMail(), 'unique:users,email,' . $this->route('user')->id],
            'password' => [Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised(), "nullable"],
            'password_confirmation' => ["same:password"],
        ];
    }
}
