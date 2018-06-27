<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $table='rate';

    public function results_period(){
        return $this->belongsTo('App\pPersonal_res_table','id');
    }
}
