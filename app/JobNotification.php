<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobNotification extends Model
{
    public function employer()
    {
        return $this->belongsTo('App\Employer','employer_name','name');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'employer_name', 'name');
    }

    public function visits()
    {
        return $this->hasMany('App\NotificationVisit');
    }
}
