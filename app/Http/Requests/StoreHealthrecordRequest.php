<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHealthrecordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'stdid' => 'required',
            'past_medical_history' => 'required',
            "drug" => 'required',
            "allergen" => 'required',
            "past_surgical_history" => 'required',
            "family_history" => 'required',
            "current_medication" => 'required',
            "history_of_present_illness" => 'required',
            "immunization" => 'required',
            "height" => 'required',
            "weight" => 'required',
            "bmi" => 'required',
            "anaemia" => 'required',
            "jaundice" => 'required',
            "position" => 'required',
            "discharge" => 'required',
            "fissures" => 'required',
            "tongue" => 'required',
            "teeth_and_gum" => 'required',
            "thyroid" => 'required',
            "lymph_node" => 'required',
            "hygiene" => 'required',
            "heart" => 'required',
            "lungs" => 'required',
            "abdomen" => 'required',
            "back" => 'required',
            "joints" => 'required',
            "deformity" => 'required',
            "sign" => 'required',
        ];
    }
}
