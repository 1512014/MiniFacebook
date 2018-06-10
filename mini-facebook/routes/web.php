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

//Route::get('/', function () {
//    return view('dashboard.home');
//})->middleware('auth');
//Route::post('/', function(){
//    return view('dashboard.home');
//});

Route::get('/user', function () {
    return view('dashboard.user-detail');
})->middleware('auth')->name('user-detail');
Route::post('/user', function(){
    return view('dashboard.user-detail');
});

Route::get('/friends', function () {
    return view('dashboard.friend-list');
})->middleware('auth')->name('friend-list');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostController')->middleware('auth');
Route::resource('comments', 'CommentController')->middleware('auth');