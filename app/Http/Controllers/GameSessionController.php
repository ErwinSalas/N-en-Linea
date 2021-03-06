<?php

namespace App\Http\Controllers;

use App\Gameboard;
use App\Gamesession;
use App\BoardLogic;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class GameSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gamesessions= DB::table('gamesessions')
            ->join('gameboards','gamesessions.board_id','=','gameboards.id')
            ->join('users', function ($join) {
                $join->on('users.id', '=', 'gamesessions.player_1_id')
                    ->where('gamesessions.state', '=', 0);
            })
            ->select('users.name','users.score','gameboards.rows_number','gameboards.id as boardID','gamesessions.id')
            ->get();

        return view('sessions.index', ['gamesessions' => $gamesessions] );
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

        $board = new BoardLogic($size,$size);
        $gameBoard=Gameboard::create([
            "size" => $size*$size,
            "rows_number" => $size,
            "columns_numbers"=> $size,
            "board_array" => (string) implode(",",$board->tablero)
        ]);
        $session=Gamesession::create([
            "player_1_id" => Auth::user()->id,
            "board_id" => $gameBoard->id,
            "state" => 0
        ]);
        return view('waitingView', ['session' => $session] );
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
        $session = Gamesession::find($id);
        $session->delete();
        return response()->json(["msg"=>"Eliminada con exito"]);
    }

    public function getSessionJson($id){
        $session=Gamesession::find($id);
        return response()->json($session);
    }

    public function getAllSessionInfo($session_id){
        $res = DB::table('gamesessions')
            ->where('gamesessions.id', $session_id)
            ->join('gameboards','gamesessions.board_id','=','gameboards.id')
            ->join('users','gamesessions.player_1_id','=','users.id')
            ->select('gamesessions.id as sessionID','users.name','gameboards.rows_number')
            ->get();

        return response()->json($res);
    }

    public function join($sessionId){
        $selectedSession = Gamesession::find($sessionId);
        $selectedSession->state = 1;
        $selectedSession->player_2_id = Auth::user()->id;
        $selectedSession->save();

        $res = Gameboard::find($selectedSession->board_id);

        return view('board', ['GameBoard' => $res] );
    }
}
