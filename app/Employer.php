<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    public function jobs()
    {
        return $this->hasMany('App\Notification');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
