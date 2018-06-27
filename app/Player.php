<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table='players';

    protected $fillable=['user_id','game_id','firm_name','status'];

    public function user(){
        return $this->belongsTo('App\User','id');
    }

    public function information_battle_of_titans(){
        return $this->hasMany('App\Information_battle_of_titan','players_id');
    }
    public function results_period(){
        return $this->hasMany('App\Results_period','player_id');
    }
    public function information_TIB(){
        return $this->hasMany('App\Information_TIB','player_id');
    }


    public function games(){
        return $this->belongsTo('App\Game','id');
    }
    public function game(){
        return $this->hasOne('App\Game','id');
    }

    public function player_games(){
        return $this->belongsToMany('App\Game','game_id');
    }
}
