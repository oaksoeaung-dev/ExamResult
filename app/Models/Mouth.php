<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mouth extends Model
{
    use HasFactory;

    protected $fillable = [
        "student_id",
        "fissures",
        "tongue",
        "teeth_and_gum",
        "remark",
    ];

    public function student() : BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
