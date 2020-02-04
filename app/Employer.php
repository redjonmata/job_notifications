<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    public function jobs()
    {
        return $this->hasMany('App\JobNotification','name','employer_name');
    }
}
