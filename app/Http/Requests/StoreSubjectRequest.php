<?php

namespace App\Http\Requests;

use App\Rules\Letter;
use Illuminate\Foundation\Http\FormRequest;

class StoreSubjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required','string',new Letter(),'unique:subjects,name'],
            'skill1' => ['string','nullable',new Letter()],
            'skill2' => ['string','nullable',new Letter()],
            'skill3' => ['string','nullable',new Letter()],
            'skill4' => ['string','nullable',new Letter()],
            'skill5' => ['string','nullable',new Letter()],
            'skill6' => ['string','nullable',new Letter()],
        ];
    }
}
