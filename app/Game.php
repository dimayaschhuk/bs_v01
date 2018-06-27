<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table='games';

    protected $fillable=['*'];

    public function player(){
        return $this->hasOne('App\Player','game_id');
    }
    public function players(){
        return $this->belongsTo('App\Player','game_id');
    }

    public function users(){
        return $this->hasOne('App\User','id');
    }
}
