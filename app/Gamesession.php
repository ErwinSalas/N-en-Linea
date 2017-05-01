<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gamesession extends Model
{
    //
    protected $fillable = [
        'player1_id', 'player2_id',  'board_id', 'state'
    ];
    public function user($player)
    {
        if($player==1){
            return $this->hasOne('App\User','player1_id');
        }
        else{
            return $this->hasOne('App\User','player2_id');
        }

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
