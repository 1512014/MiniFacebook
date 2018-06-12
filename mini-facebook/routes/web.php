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

//Home page
Route::get('/', 'PostController@index')->middleware('auth');

//User pages
Route::get('/user/{id}', 'UserController@getUserById')->middleware('auth')->name('user-detail');
Route::get('/user/{id}/friends', 'UserController@getFriendList')->middleware('auth')->name('user-friend-list');
Route::get('/user/{id}/requests', 'UserController@getFriendRequests')->middleware('auth')->name('user-friend-request');
Route::get('/user/{id}/about', 'UserController@getAbout')->middleware('auth')->name('user-about');
Route::get('/user/{id}/avatar-cover', 'UserController@getAvatarAndCover')->middleware('auth')->name('user-avatar-cover');
Route::post('/friends/delete/{id}', 'UserController@removeFriendById')->middleware('auth')->name('delete-friend');
Route::post('/friends/accept/{id}', 'UserController@acceptRequest')->middleware('auth')->name('accept-request');
Route::post('/friends/add/{id}', 'UserController@addFriend')->middleware('auth')->name('add-friend');

Route::post('/comments/create', 'CommentController@addNewComment')->middleware('auth')->name('add-comment');

//Message
//Route::get('/message/create', 'MessageController@addNewMessage')->middleware('auth')->name('add-message');
Route::get('/messages', 'MessageController@getNewMessages')->middleware('auth')->name('get-new-message');
Route::post('/messages/create', 'MessageController@addNewMessage')->middleware('auth')->name('add-message');

Auth::routes();

Route::resource('posts', 'PostController')->middleware('auth');