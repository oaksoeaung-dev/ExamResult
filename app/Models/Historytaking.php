<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Historytaking extends Model
{
    use HasFactory;

    protected $fillable = [
        "student_id",
        "past_medical_history",
        "family_history",
        "past_surgical_history",
        "current_medication",
        "history_of_present_illness",
    ];

    public function student() : BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

}
