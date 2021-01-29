<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('room', 'App\Http\Controllers\roomController@getAllRooms');
Route::get('room/{id}', 'App\Http\Controllers\roomController@getRoom');
Route::post('room', 'App\Http\Controllers\roomController@createRoom');
Route::put('room/{id}', 'App\Http\Controllers\roomController@updateRoom');
Route::delete('room/{id}','App\Http\Controllers\roomController@deleteRoom');