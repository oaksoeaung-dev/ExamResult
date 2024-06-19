<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Healthrecordqrcode extends Model
{
    use HasFactory;

    protected $fillable = [
        "student_id",
        "url",
        "qrcode_path",
    ];

    public function student() : BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
