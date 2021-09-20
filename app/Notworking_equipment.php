<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notworking_equipment extends Model
{
    protected $guarded = ['id'];
    public function maintenance(){
        return $this->belongsTo('App\Maintenance');
    }
    public function check(){
        return $this->belongsTo('App\Check');
    }
    public function tower_equipment(){
        return $this->belongsTo('App\Tower_equipment');
    }
}
