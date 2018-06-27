<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Results_period extends Model
{
    protected $table='results_period';
    public function player(){
        return $this->belongsTo('App\Player','id');
    }
    public function personal_res_table(){
        return $this->hasMany('App\personal_res_table','res_per_id');
    }
    public function rate(){
        return $this->hasMany('App\Rate','result_period_id');
    }
}
