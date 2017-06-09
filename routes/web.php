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
    return view('welcome');
});


// author render create view
Route::get('/author', 'AuthorController@createView')
	->name('author');
//  author create route
Route::post('/author', 'AuthorController@create')
	->name('author_create');
// author detail route
Route::get('/author/{id}', 'AuthorController@detail')
	->name('author_detail');