<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tower extends Model
{
    protected $guarded = ['id'];

    public function project(){
        return $this->belongsTo('App\Project');
    }
    public function tower_equipment(){
        return $this->hasMany('App\Tower_equipment');
    }
}
