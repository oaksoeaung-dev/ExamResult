<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Academicclass extends Model
{
    use HasFactory;

    protected $table = "academicclasses";

    protected $fillable = [
        'name',
        'slug',
        'startdate',
        'enddate',
    ];

    public function subjects(): MorphToMany
    {
        return $this->morphedByMany(Subject::class, 'academicclassable');
    }

    public function activities(): MorphToMany
    {
        return $this->morphedByMany(Activity::class, 'academicclassable');
    }

    public function behaviours(): MorphToMany
    {
        return $this->morphedByMany(Behaviour::class, 'academicclassable');
    }

    public function students() : BelongsToMany
    {
        return $this->belongsToMany(Student::class);
    }
}
