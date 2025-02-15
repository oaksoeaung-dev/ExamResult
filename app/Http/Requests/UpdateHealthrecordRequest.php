<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHealthrecordRequest extends FormRequest
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
            "medical_conditions_currently_being_experienced" => "required",
            "health_issues_in_the_past" => "required",
            "allergies" => "required",
            "previous_vaccination" => "required",
            "current_medications" => "required",
            "skin" => "required",
            "height" => "required",
            "pulse_rate" => "required",
            "temperature" => "required",
            "weight" => "required",
            "blood_pressure" => "required",
            "bmi" => "required",
            "spo2" => "required",
            "pupil" => "required",
            "right_visual_fields" => "required",
            "color_vision" => "required",
            "left_visual_fields" => "required",
            "right" => "required",
            "left" => "required",
            "eyes_and_pupils" => "required",
            "nose" => "required",
            "throat" => "required",
            "teeth_and_mouth" => "required",
            "lungs_and_chest" => "required",
            "cardiovascular_system" => "required",
            "abdomen" => "required",
            "extremities_and_back" => "required",
            "musculoskeletal" => "required",
            "mental_health_status" => "required",
            "fitArea" => "required",
            "futherAssessment" => "required",
            "sign" => "required",
        ];
    }
}
