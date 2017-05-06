<?php

namespace App\Http\Controllers;


class GameBoardController extends Controller
{
    //
    public $turn;
    public $gameBoard;

    /*function __construct(){

    }*/
    public function homeDisplay(){
        return view('homeSection');
    }
    public function game_start()
    {

        return view('gameBoard');

    }
    public function loadGameBoardView()
    {

        $this->gameBoard= new Board();
        $this->gameBoard->crearTablero();
        $this->turn=true;
        return view('board', ['GameBoard' => $this->gameBoard]);

    }
    public function playerDoMove(Request $request)
    {
        $this->gameBoard->pullCoin($request->column,$this->turn);
        if($this->turn){
            $this->turn=false;
        }
        else{
            $this->turn=true;
        }
        return view('board', ['GameBoard' => $this->gameBoard]);
    }


    public function pcDoMove()
    {
        $this->gameBoard->easyModePC();
        if($this->turn){
            $this->turn=false;
        }
        else{
            $this->turn=true;
        }
        return view('board', ['GameBoard' => $this->gameBoard]);
    }
}

