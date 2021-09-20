<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $guarded = ['id'];

    public function invoice(){
        return $this->hasMany('App\Invoice');
    }
     public function project(){
        return $this->hasMany('App\Project');
    }
}
