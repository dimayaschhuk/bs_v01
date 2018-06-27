<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class personal_res_table extends Model
{
    protected $table='personal_res_tables';
    public function results_period(){
        return $this->belongsTo('App\Results_period','id');
    }
}
