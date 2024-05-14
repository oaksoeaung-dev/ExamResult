<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAcademicclassRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "name" => ['required','string', "regex:/^[a-zA-Z0-9\s()-]+$/", "unique:academicclasses,name,".$this->route('class')->id],
            "start" => ['required'],
            "end" => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            "start.required" => "The start date field is required.",
            "end.required" => "The end date field is required.",
        ];
    }
}
