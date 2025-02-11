<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Hearing extends Model
{
    protected $fillable = [
        "student_id",
        "right",
        "left",
    ];
    public function student() : BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
