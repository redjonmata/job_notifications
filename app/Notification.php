<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function employer()
    {
        return $this->belongsTo('App\Employer');
    }

    public function visits()
    {
        return $this->hasMany('App\NotificationVisit');
    }
}
