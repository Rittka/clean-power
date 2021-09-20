<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    protected $guarded = ['id'];

    public function project(){
        return $this->belongsTo('App\Project');
    }
     public function notworking_equipment(){
        return $this->hasMany('App\Notworking_equipment');
    }
    public function staff_check(){
        return $this->hasMany('App\Staff_check');
    }
}
