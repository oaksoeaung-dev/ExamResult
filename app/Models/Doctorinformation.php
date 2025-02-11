<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Doctorinformation extends Model
{   
    protected $fillable = [
        "student_id",
        "fit_in_all_area",
        "futher_assessment",
        "comment",
        "name",
        "doctor_sign",
    ];

    public function student() : BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
