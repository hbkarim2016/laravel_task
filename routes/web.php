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

// == Post Controls
// Fetch All Posts
Route::get('/', 'PostController@index');

// Find This Post By Post Id
Route::get('/add_post', 'PostController@add_page');

// Fetch All Posts By User Id
Route::get('/user_posts/{id}', 'PostController@postUser');

// Find This Post By Post Id
Route::get('/single_post/{id}', 'PostController@show');

// Add Comment To This Post Page
Route::get('/add_comment/{id}', 'PostController@add_comment');
// Store Comment To This Post
Route::post('/single_post/{id}/commentAdding', 'PostController@store_comment');

// Add New Post
Route::post('/postAdding', 'PostController@create_post');
// update Post
Route::get('/edit_post/{id}', 'PostController@edit_post');
Route::post('/edit_post/{id}/postEditing', 'PostController@update_post');

// Delete Post
Route::get('/deleting/{id}', 'PostController@delete');
// ========================================================================

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
