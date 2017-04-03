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


Route::get('/','HomeController@index');

Route::get('/homeSection', function () {
    return view('homeSection');
});

Route::get('/session',function(){
    return view('sessions.create');
});

Route::get('/loadGameBoard', 'GameBoardController@loadGameBoardView');

Route::get('auth/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\LoginController@handleProviderCallback');


Auth::routes();





Auth::routes();

Route::get('/home', 'HomeController@index');
