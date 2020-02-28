<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'notifications'], function () {
    Route::get('/','NotificationController@index');
    Route::post('/','NotificationController@store');
    Route::get('/{id}','NotificationController@show');
    Route::put('/{id}','NotificationController@update');
    Route::delete('/{id}','NotificationController@destroy');
});

Route::group(['prefix' => 'blog'], function () {
    Route::get('/','BlogController@index');
    Route::post('/','BlogController@store');
    Route::get('/{id}','BlogController@show');
    Route::put('/{id}','BlogController@update');
    Route::delete('/{id}','BlogController@destroy');
});

Route::group(['prefix' => 'employers'], function () {
    Route::get('/','EmployerController@index');
    Route::post('/','EmployerController@store');
    Route::get('/{id}','EmployerController@show');
    Route::put('/{id}','EmployerController@update');
});

