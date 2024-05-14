<?php

namespace App\Http\Requests;

use App\Rules\KbtcMail;
use App\Rules\Letter;
use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:50', new Letter()],
            'email' => ['required','email',new KbtcMail(),'unique:students,email'],
            'phone' => ['required','numeric'],
            'gender' => ['required','in:male,female'],
            'studentphoto' => ['extensions:jpg,jpeg,png','mimes:jpg,jpeg,png','file','max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'studentphoto.max' => 'The photo size must not be greater than 2MB.',
        ];
    }
}
