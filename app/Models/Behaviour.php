<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Behaviour extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function academicClasses() : MorphToMany
    {
        //return $this->morphToMany(AcademicClass::class,"classable",'classables','classable_id','academicclass_id');
        return $this->morphToMany(Academicclass::class,"academicclassable");
    }
}
