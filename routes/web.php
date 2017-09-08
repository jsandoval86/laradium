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

/** Post **/
// post list
Route::get('/', 'PostController@listView')
	->name('post_list');
// render create view post
Route::get('/post-add', 'PostController@createView')
	->name('post_create_view');
// detail post
Route::get('/post/{id}', 'PostController@detailView')
	->name('post_detail');
// create post
Route::post('/post', 'PostController@create')
	->name('post_create');
// likes button
Route::post('/post/{id}/likes', 'PostController@likes')
	->name('post_like');
/** Post **/

/* Comments */
Route::post('/post/{id}/comment', 'CommentController@create')
	->name('comment_create');
/* Comments */

// auth routes
Auth::routes();

// log out
Route::get('/logout', 'Auth\LoginController@logout')
	->name('logout');

