<?php

namespace App\Http\Controllers;

use App\Gameboard;
use App\Gamesession;
use App\BoardLogic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gamesessions= Gamesession::all()->where('state', '=', 1);


        return view('gameSession', ['gamesessions' => $gamesessions] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $size=$request->input("size");
        $board = new BoardLogic(sqrt($size),sqrt($size));
        $gameBoard=Gameboard::create([
            "size" => $size,
            "rows_number" => sqrt($size),
            "columns_numbers"=> sqrt($size),
            "board_array" => $board
        ]);
        Gamesession::create([
            "player_1_id" => Auth::user()->id,
            "board_id" => $gameBoard->id,
            "state" => 0
        ]);


        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
