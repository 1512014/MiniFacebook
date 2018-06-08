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

Route::get('/', function () {
    return view('dashboard.home');
})->middleware('auth');
Route::post('/', function(){
    return view('dashboard.home');
});

Route::get('/user', function () {
    return view('dashboard.user-detail');
})->middleware('auth');
Route::post('/user', function(){
    return view('dashboard.user-detail');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
