<?php

namespace App\Http\Requests;

use App\Rules\Letter;
use Illuminate\Foundation\Http\FormRequest;

class StoreActivityRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => ['required','string',new Letter(),'unique:activities,name'],
        ];
    }
}
