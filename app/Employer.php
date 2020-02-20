<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $fillable = ['title','city','country','address','phone','mobile_phone','fax','category_id','image'];

    protected $guarded = ['slug'];

    public function jobs()
    {
        return $this->hasMany('App\Notification');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
