<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'skill1',
        'skill2',
        'skill3',
        'skill4',
        'skill5',
        'skill6',
    ];

    public function academicClasses() : MorphToMany
    {
        return $this->morphToMany(Academicclass::class,"academicclassable");
    }
}
