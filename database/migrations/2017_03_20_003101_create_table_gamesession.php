<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGamesession extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gamesession', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('player_1_id')->unsigned();
            $table->integer('player_2_id')->unsigned()->nullable();
            $table->integer('board_id')->unsigned()->nullable();
            $table->integer('state');
            $table->foreign('board_id')->references('id')->on('gameboard');
            $table->foreign('player_1_id')->references('id')->on('users');
            $table->foreign('player_2_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
