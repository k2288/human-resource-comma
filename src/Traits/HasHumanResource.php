<?php

namespace Raahin\HumanResource\Traits;


use Raahin\HumanResource\Models\Education;
use Raahin\HumanResource\Models\EmergencyContact;
use Raahin\HumanResource\Models\Experience;
use Raahin\HumanResource\Models\Profile;

trait HasHumanResource
{

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function education()
    {
        return $this->hasMany(Education::class);
    }

    public function experience()
    {
        return $this->hasMany(Experience::class);
    }

    public function emergencyContact()
    {
        return $this->hasMany(EmergencyContact::class);
    }
}