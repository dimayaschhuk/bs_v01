<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information_TIB extends Model
{
    protected $table='Information_TIB';
    protected $fillable=['*'];

    public function player(){
        return $this->belongsTo('App\Player','id');
    }
}
