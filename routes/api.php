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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/*
Route::get('/cities', 'CityController@index');
Route::post('/cities', 'CityController@store');
*/


Route::resource('cities', 'CityController');
Route::resource('sites', 'SiteController');
Route::resource('rooms', 'RoomController');
Route::resource('reservations', 'ReservationController');
Route::resource('users', 'UserController');
