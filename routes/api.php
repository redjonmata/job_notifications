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

Route::get('/notifications','NotificationController@index');
Route::post('/notifications','NotificationController@store');
Route::get('/notifications/{id}','NotificationController@show');
Route::put('/notifications/{id}','NotificationController@update');
Route::delete('/notifications{id}','NotificationController@delete');
