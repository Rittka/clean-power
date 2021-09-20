<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tower_equipment extends Model
{
 protected $guarded = ['id'];

    public function tower(){
        return $this->belongsTo('App\Tower');
    }
    public function equipment(){
        return $this->belongsTo('App\Equipment');
    }
}
