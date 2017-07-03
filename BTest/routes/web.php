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

Route::get('/', 'homeController@home');

Route::get('/register', function (){
    return view('register');
});

Route::post('/register', 'registerController@subscribe');

Route::get('/login', function() {
    return view('login');
});

Route::get('/logoff', function(){
    Session::flush();
    return redirect('/');
});

Route::post('/loginme', 'loginController@login');

Route::get('/start/{id}', 'playController@play');

Route::get('/play/{id}', 'playController@answer');

Route::get('/result', 'playController@result');

Route::get('/search/{string}', 'searchController@search');

Route::get('/leaderboard', 'LeaderboardSelectController@Selector');

Route::get('/leaderboard/{test_id}', 'LeaderboardController@Leaderboard');