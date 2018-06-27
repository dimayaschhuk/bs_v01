<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information_battle_of_titan extends Model
{
    protected $table='information_battle_of_titans';

//    protected $fillable=['*'];

    public function player(){
        return $this->belongsTo('App\Player','id');
    }

}
