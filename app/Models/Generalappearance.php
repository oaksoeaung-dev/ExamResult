<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Generalappearance extends Model
{
    protected $fillable = [
        "student_id",
        "skin",
        "height",
        "pulse_rate",
        "temperatur",
        "weight",
        "blood_pressure",
        "bmi",
        "spo2",
    ];
    public function student() : BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
