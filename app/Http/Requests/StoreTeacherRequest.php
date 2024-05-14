<?php

namespace App\Http\Requests;

use App\Rules\KbtcMail;
use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required','email',new KbtcMail(),'unique:teachers,email'],
            'sign' => ['extensions:png','mimes:png','file','max:2048','required'],
        ];
    }

    public function messages(): array
    {
        return [
            'sign.max' => 'The photo size must not be greater than 2MB.',
        ];
    }
}
