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


Route::group(['prefix' => 'front'], function () {
    Route::group(['prefix' => 'songs'], function () {
        Route::get('/', 'api\SongController@index');
    });
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::put('songs', 'api\SongController@update');
    });
});
