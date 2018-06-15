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

//Post
Route::resource('posts', 'PostController')->middleware('auth');

//User pages
Route::get('/user/{id}', 'UserController@getUserById')->middleware('auth')->name('user-detail');
Route::get('/user/{id}/friends', 'UserController@getFriendList')->middleware('auth')->name('user-friend-list');
Route::get('/user/{id}/requests', 'UserController@getFriendRequests')->middleware('auth')->name('user-friend-request');
Route::get('/user/{id}/about', 'UserController@getAbout')->middleware('auth')->name('user-about');
Route::get('/user/{id}/avatar-cover', 'UserController@getAvatarAndCover')->middleware('auth')->name('user-avatar-cover');
Route::post('/friends/delete/{id}', 'UserController@removeFriendById')->middleware('auth')->name('delete-friend');
Route::post('/friends/accept/{id}', 'UserController@acceptRequest')->middleware('auth')->name('accept-request');
Route::post('/friends/add/{id}', 'UserController@addFriend')->middleware('auth')->name('add-friend');

//Comment
Route::post('/comments/create', 'CommentController@addNewComment')->middleware('auth')->name('add-comment');
Route::get('/comments/{id}', 'CommentController@getComment')->middleware('auth')->name('get-comment');
Route::put('/comments/{id}', 'CommentController@updateComment')->middleware('auth')->name('update-comment');
Route::delete('/comments/{id}', 'CommentController@deleteComment')->middleware('auth')->name('delete-comment');

//Message
Route::get('/messages/group', 'MessageController@getNewGroupMessages')->middleware('auth')->name('get-new-group-message');
Route::get('/messages', 'MessageController@getNewMessages')->middleware('auth')->name('get-new-message');
Route::post('/messages/create', 'MessageController@addNewMessage')->middleware('auth')->name('add-message');

//Group
Route::get('/groups', 'GroupController@getCurrentUserGroups')->middleware('auth');
Route::get('/groups/{id}/users', 'GroupController@getUsersByGroup')->middleware('auth');
Route::post('/groups', 'GroupController@addNewGroup')->middleware('auth');

//Auth
Auth::routes();