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
        Schema::create('gamesessions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('player1_id')->unsigned();
            $table->integer('player2_id')->unsigned()->nullable();
            $table->integer('board_id')->unsigned()->nullable();
            $table->integer('state');
            $table->foreign('board_id')->references('id')->on('gameboards');
            $table->foreign('player1_id')->references('id')->on('users');
            $table->foreign('player2_id')->references('id')->on('users');
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
