<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gamesession extends Model
{
    //
    protected $fillable = [
        'player_1_id', 'player_2_id',  'board_id', 'state'
    ];
    public function player_1()
    {
        return $this->hasOne('App\User');
    }

    public function player_2()
    {
        return $this->hasOne('App\User');
    }
    public function gameboard()
    {
        return $this->hasOne('App\Gameboard');
    }
}
