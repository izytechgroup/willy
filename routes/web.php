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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'views\front\HomeController@index')->name('home');
Route::get('audio', 'views\front\AudioController@index')->name('audio');
Route::get('logout', 'views\front\AuthController@logout')->name('logout');
Route::group(['prefix' => 'videos'], function () {
    Route::get('/', 'views\front\VideoController@index')->name('videos.all');
    Route::get('{number}', 'views\front\VideoController@show')->name('videos.one');
});
Route::group(['prefix' => 'songs'], function () {
    Route::get('{number}/downloads', 'api\SongController@downloads');
});
