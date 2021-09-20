<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff_check extends Model
{
    protected $guarded = ['id'];
    public function check(){
        return $this->belongsTo('App\Check');
    }
    public function staff(){
        return $this->belongsTo('App\Staff');
    }
}
