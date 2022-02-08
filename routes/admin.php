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
Route::group(['prefix' => 'admin'], function () {
    Route::namespace('App\Http\Controllers')->group(function () {
        Route::any('/uploaded-files/file-info', 'AizUploadController@file_info')->name('uploaded-files.info');
        Route::resource('/uploaded-files', 'AizUploadController');
        Route::get('/uploaded-files/destroy/{id}', 'AizUploadController@destroy')->name('uploaded-files.destroy');
    });
}); 


Route::prefix('admin')->name('admin.')->namespace('App\Http\Controllers\Backend')->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('/userdata', 'Auth\LoginController@userdata')->name('');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::prefix('user')->name('user.')->group(function () {
        Route::resource('/', 'UserController', ['parameters' => ['' => 'id']]);
        Route::get('status/{id}', 'FeatureController@changeStatus')->name('status');
        Route::post('/search', 'UserController@fillSearch')->name('fillSearch');
    });
    Route::prefix('feature')->name('feature.')->group(function () {
        Route::resource('/', 'FeatureController', ['parameters' => ['' => 'id']]);
        Route::get('status/{id}', 'FeatureController@changeStatus')->name('status');
        Route::post('search', 'FeatureController@fillSearch')->name('fillSearch');
    });
    Route::prefix('album')->name('album.')->group(function () {
        Route::resource('/', 'AlbumController', ['parameters' => ['' => 'id']]);
        Route::get('status/{id}', 'AlbumController@changeStatus')->name('status');
        Route::post('search', 'AlbumController@fillSearch')->name('fillSearch');
    });
    Route::prefix('artist')->name('artist.')->group(function () {
        Route::resource('/', 'ArtistController', ['parameters' => ['' => 'id']]);
        Route::get('status/{id}', 'ArtistController@changeStatus')->name('status');
        Route::post('search', 'ArtistController@fillSearch')->name('fillSearch');
    });
    Route::prefix('tag')->name('tag.')->group(function () {
        Route::resource('/', 'TagController', ['parameters' => ['' => 'id']]);
        Route::get('status/{id}', 'TagController@changeStatus')->name('status');
        Route::post('search', 'TagController@fillSearch')->name('fillSearch');
    });
    Route::prefix('song')->name('song.')->group(function () {
        Route::resource('/', 'SongController', ['parameters' => ['' => 'id']]);
        Route::get('status/{id}', 'SongController@changeStatus')->name('status');
        Route::post('search', 'SongController@fillSearch')->name('fillSearch');
    });
});
