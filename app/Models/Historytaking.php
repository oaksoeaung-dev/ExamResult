<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Historytaking extends Model
{
    protected $fillable = [
        "student_id",
        "medical_conditions_currently_being_experienced",
        "health_issues_in_the_past",
        "allergies",
        "previous_vaccination",
        "current_medications",
    ];
    public function student() : BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
