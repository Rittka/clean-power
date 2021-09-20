<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff_project extends Model
{
    protected $guarded = ['id'];
    public function staff(){
        return $this->belongsTo('App\Staff');
    }
    
    public function project(){
        return $this->belongsTo('App\Project');
    }
}
