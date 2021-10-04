<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $guarded = ['id'];
    public function staff_maintenance(){
        return $this->hasMany('App\Staff_Maintenance');
    }
    public function notworking_equipment(){
        return $this->hasMany('App\Notworking_equipment');
    }
    public function project(){
        return $this->belongsTo('App\Project');
    }
}
