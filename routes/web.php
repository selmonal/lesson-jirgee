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

Route::post('/posts', 'PostsController@store');

Route::get('settings/profile', 'ProfileSettingsController@show');

Route::post('settings/profile/update-image', 'UserImageController@update');

Route::delete('/posts/{post}', 'PostsController@destroy');