<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{  protected $guarded = ['id'];

    public function region(){
        return $this->belongsTo('App\Region');
    }

    public function check(){
        return $this->hasMany('App\Check');
    }
    public function maintenance(){
        return $this->hasMany('App\Maintenance');
    }
    public function staffs(){
        return $this->hasMany('App\Staff_project');
    }
    public function person(){
        return $this->belongsTo('App\Person' , 'customer_id');
    }
    public function tower(){
        return $this->hasMany('App\Tower');
    }
}
