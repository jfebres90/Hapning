<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//Route::get('/', 'DynamicPagesController@welcome');
Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'web'], function () {

    Route::auth();
    Route::get('/about','StaticPagesController@about');
    Route::get('/edit_profile','DynamicPagesController@edit_profile');
    Route::get('myEvents','eventsPageController@myEvents');
    Route::resource('events', 'eventsPageController');



});

