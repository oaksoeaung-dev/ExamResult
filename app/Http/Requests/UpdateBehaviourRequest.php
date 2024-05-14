<?php

namespace App\Http\Requests;

use App\Rules\Letter;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBehaviourRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required','string',new Letter(),'unique:behaviours,name,'.$this->route('behaviour')->id],
        ];
    }
}
