<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'login',   'id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function player()
    {
        return $this->hasMany('App\Player', 'user_id');
    }

    public function transaction()
    {
        return $this->hasOne('App\Transaction', 'user_id');
    }

    public function game()
    {
        return $this->belongsToMany('App\Game','creator_id');
    }
}
