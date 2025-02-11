<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vision extends Model
{
    protected $fillable = [
        "student_id",
        "pupil",
        "right_visual_fields",
        "color_vision",
        "left_visual_fields",
    ];

    public function student() : BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
