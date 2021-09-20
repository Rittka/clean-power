<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $guarded = ['id'];

    public function invoice_details(){
        return $this->hasMany('App\Invoice_details');
    }
    public function person(){
        return $this->belongsTo('App\Person');
    }
}
