<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('admin/login', 'views\admin\AuthController@login')->name('admin.login');
Route::post('admin/login', 'views\admin\AuthController@signin')->name('admin.signin');

Route::group(['prefix' => 'admin', 'middleware' => ['admin_auth', 'admin']], function() {

    Route::get('/', 'views\admin\AdminController@home')->name('admin');
    Route::get('files', 'views\admin\AdminController@files')->name('admin.files');
    Route::get('logout', 'views\admin\AuthController@logout')->name('admin.logout');
    Route::post('password', 'views\admin\AuthController@password')->name('admin.password');
    Route::get('settings', 'views\admin\SettingController@show')->name('admin.settings');
    Route::post('settings', 'views\admin\SettingController@update')->name('admin.settings.update');
    Route::get('videos/{number}/delete', 'views\admin\VideoController@delete')->name('admin.video.delete');

    Route::group(['prefix' => 'songs'], function () {
        Route::group(['prefix' => 'playlists'], function () {
            Route::post('/', 'views\admin\SongPlaylistController@store')->name('audio.playlist.store');
            Route::get('create', 'views\admin\SongPlaylistController@create')->name('audio.playlist.create');
            Route::get('{id}', 'views\admin\SongPlaylistController@show')->name('audio.playlist.show');
            Route::put('{id}', 'views\admin\SongPlaylistController@update')->name('audio.playlist.update');
            Route::get('{id}/edit', 'views\admin\SongPlaylistController@edit')->name('audio.playlist.edit');
            Route::post('{id}/songs', 'views\admin\SongController@store')->name('audio.playlist.song.add');
        });
    });


    Route::resource('users', 'views\admin\UserController');
    Route::resource('pages', 'views\admin\PageController');
    Route::resource('posts', 'views\admin\PostController');
    Route::resource('events', 'views\admin\EventController');
    Route::resource('songs', 'views\admin\SongController');
    Route::resource('videos', 'views\admin\VideoController');


});
