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


//Home page
Route::get('/', 'PostController@index')->middleware('auth');

Route::get('/user/{id}', 'UserController@getUserById')->middleware('auth')->name('user-detail');
Route::get('/user/{id}/friends', 'UserController@getFriendList')->middleware('auth')->name('user-friend-list');
Route::get('/user/{id}/requests', 'UserController@getFriendRequests')->middleware('auth')->name('user-friend-request');
Route::get('/user/{id}/about', 'UserController@getAbout')->middleware('auth')->name('user-about');
Route::get('/user/{id}/avatar-cover', 'UserController@getAvatarAndCover')->middleware('auth')->name('user-avatar-cover');

//Route::get('/user/{id}', 'UserController@getPostByUser')->middleware('auth')->name('user-friend');
//Route::post('/user/{id}', function(){
//    return view('dashboard.user-detail');
//});



Auth::routes();

Route::resource('posts', 'PostController')->middleware('auth');
Route::resource('comments', 'CommentController')->middleware('auth');