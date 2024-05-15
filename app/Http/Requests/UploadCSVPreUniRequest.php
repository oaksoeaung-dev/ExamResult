<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadCSVPreUniRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "csv" => "file|required|mimes:csv,txt",
            'marks' => 'required'
        ];
    }

    public function messages()
    {
        return [
            "marks" => "Need to choose marks."
        ];
    }
}
