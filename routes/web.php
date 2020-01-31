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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'LoginController@show');
Route::post('/addtweet', 'LoginController@store');
Route::post('/profile', 'LoginController@delete');
Route::post('/profile/editPost', 'LoginController@edit');
Route::post('/profile/saveTweet', 'LoginController@save');
