<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadXLSXISRequest extends FormRequest
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
            "xlsx" => "file|required|mimes:xlsx",
        ];
    }
}
