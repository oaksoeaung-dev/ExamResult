<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'stdId',
        'stdKey',
        'name',
        'email',
        'phone',
        'address',
        'dob',
        'guardian_name',
        'gender',
        'image',
    ];

    public function academicClasses() : BelongsToMany
    {
        return $this->belongsToMany(Academicclass::class);
    }

    public function historytaking() : HasOne
    {
        return $this->hasOne(Historytaking::class);
    }

    public function generalAppearance(): HasOne
    {
        return $this->hasOne(Generalappearance::class);
    }

    public function hearing(): HasOne
    {
        return $this->hasOne(Hearing::class);
    }

    public function physicalmentalhealthassessment(): HasOne
    {
        return $this->hasOne(Physicalmentalhealthassessment::class);
    }

    public function vision(): HasOne
    {
        return $this->hasOne(Vision::class);
    }

    public function doctorinformation(): HasOne
    {
        return $this->hasOne(Doctorinformation::class);
    }

    public function healthrecordqrcode() : HasOne
    {
        return $this->hasOne(Healthrecordqrcode::class);
    }
}
