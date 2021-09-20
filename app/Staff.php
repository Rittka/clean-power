<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staffs';
    protected $guarded = ['id'];
    public function staff_check(){
        return $this->hasMany('App\Staff_check');
    }
    public function staff_maintenance(){
        return $this->hasMany('App\Staff_maintenance');
    }
    public function staff_project(){
        return $this->hasMany('App\Staff_project');
    }
}
