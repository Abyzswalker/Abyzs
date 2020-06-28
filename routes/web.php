<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'IndexController@index')->name('/');

Route::resource('/travel', 'TravelController');
Route::resource('/style', 'StyleController');
//Route::resource('/comment', 'CommentController');


Route::get('/fashion', 'FashionController@index')->name('fashion');
Route::get('/sports', 'SportsController@index')->name('sports');
Route::get('/video', 'VideoController@index')->name('video');
Route::get('/archives', 'ArchivesController@index')->name('archives');

Route::post('/posts/{post}/comments', 'CommentsController@store');
//Route::post('/posts/{post}/comment', 'CommentsController@edit')->name('edit');




Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
