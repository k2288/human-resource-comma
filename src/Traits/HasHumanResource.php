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

    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function emergencyContacts()
    {
        return $this->hasMany(EmergencyContact::class);
    }
}