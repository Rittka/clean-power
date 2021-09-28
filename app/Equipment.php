<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $guarded = ['id'];
    protected $table = 'equipments';

    public function tower_equipment(){
        return $this->hasMany('App\Tower_equipment');
    }
    public function invoice_details(){
        return $this->hasMany('App\Invoice_details');
    }

}
