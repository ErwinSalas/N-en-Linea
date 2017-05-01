<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', function () {
    return view('home');
});

Route::get('/sessionCreateView', function () {
    return view('sessions.create');
});

Route::get('/','HomeController@index');

Route::get('/homeSection', function () {
    return view('welcome');
});

Route::get('/session',function(){
    return view('sessions.create');
});
Route::get('/sessionwaiting',function(){
    return view('waitingView');
});
Route::get('/waitSection',function(){
    return view('sessions.waiting');
});

Route::get('/loadGameBoard', 'GameBoardController@loadGameBoardView');
Route::get('/joinSession', 'GameSessionController@joinSession/{sessionId}/{playerID}');
Route::get('auth/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\LoginController@handleProviderCallback');
Route::resource('gameSession','GameSessionController');

Auth::routes();

Route::get('/jsongamessesion/{id}', 'GameSessionController@getSessionJson');

Route::get('/sessionInfo/{id}', 'GameSessionController@getAllSessionInfo');
Route::get('/deleteSession/{id}','GameSessionController@destroy');
Route::get('/home', 'HomeController@index');
