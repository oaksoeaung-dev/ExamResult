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

    public function bodystatus() : HasOne
    {
        return $this->hasOne(Bodystatus::class);
    }

    public function heart() : HasOne
    {
        return $this->hasOne(Heart::class);
    }

    public function lungs() : HasOne
    {
        return $this->hasOne(Lungs::class);
    }

    public function abdomen() : HasOne
    {
        return $this->hasOne(Abdomen::class);
    }

    public function mouth() : HasOne
    {
        return $this->hasOne(Mouth::class);
    }

    public function eye() : HasOne
    {
        return $this->hasOne(Eye::class);
    }

    public function ear() : HasOne
    {
        return $this->hasOne(Ear::class);
    }

    public function neck() : HasOne
    {
        return $this->hasOne(Neck::class);
    }

    public function musculoskeletal() : HasOne
    {
        return $this->hasOne(Musculoskeletal::class);
    }

    public function allergy() : HasOne
    {
        return $this->hasOne(Allergy::class);
    }

    public function immunization() : HasOne
    {
        return $this->hasOne(Immunization::class);
    }

    public function hygiene() : HasOne
    {
        return $this->hasOne(Hygiene::class);
    }

    public function doctorsign() : HasOne
    {
        return $this->hasOne(Doctorsign::class);
    }

    public function healthrecordqrcode() : HasOne
    {
        return $this->hasOne(Healthrecordqrcode::class);
    }
}
