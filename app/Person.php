<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $guarded = ['id'];

    public function invoice(){
        return $this->hasMany('App\Invoice');
    }
     public function projects(){
        return $this->hasMany('App\Project' , 'customer_id');
    }
}
