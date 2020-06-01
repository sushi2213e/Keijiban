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

Route::get('/', 'ThreadController@index');
Route::get('/{thread}', 'ThreadController@showThread')->where('thread', '[0-9]+');
Route::post('/{thread}', 'ThreadController@addComment')->where('thread', '[0-9]+');
Route::get('/new', 'ThreadController@showCreateForm');
Route::post('/new', 'ThreadController@create');
