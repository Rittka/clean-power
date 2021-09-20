<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_details extends Model
{
    protected $guarded = ['id'];

    public function equipment(){
        return $this->belongsTo('App\Equipment');
    }
    public function invoice(){
        return $this->belongsTo('App\Invoice');
    }
}
