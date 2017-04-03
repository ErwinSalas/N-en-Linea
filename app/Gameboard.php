<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gameboard extends Model
{
    /*
     * Generate a primary key based
     *  in all keys of other tables
     * that have any relationship with this tables*/

    protected $fillable = [
        'size', 'rows_number', 'columns_numbers','board_array'
    ];

    public function gamesession()
    {
        return $this->belongsTo('App\Gamesession');
    }


}
