<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Physicalmentalhealthassessment extends Model
{
    protected $fillable = [
        "student_id",
        "eyes_and_pupils",
        "nose",
        "throat",
        "teeth_and_Mouth",
        "lungs_and_chest",
        "cardiovascular_system",
        "abdomen",
        "extremities_and_back",
        "musculoskeletal",
        "mental_health_status",
    ];

    public function student() : BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
