<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff_maintenance extends Model
{
    protected $guarded = ['id'];
    public function staff(){
        return $this->belongsTo('App\Staff');
    }
    public function maintenance(){
        return $this->belongsTo('App\Maintenance');
    }
}
