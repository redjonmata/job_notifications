<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationVisit extends Model
{
    public function notification()
    {
        return $this->belongsTo('App\JobNotification');
    }
}
