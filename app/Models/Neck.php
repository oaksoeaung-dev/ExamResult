<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Neck extends Model
{
    use HasFactory;

    protected $fillable = [
        "student_id",
        "thyroid",
        "lymph_node",
    ];

    public function student() : BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
