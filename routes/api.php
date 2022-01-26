<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::namespace('App\Http\Controllers\Api\Admin')->group(function () {
    Route::get('/login', 'AuthController@showLogin')->name('login');
    Route::get('/loginHandle', 'AuthController@loginHandle')->name('admin.login.handle');
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::group(['prefix' => 'admin'], function () {
        // Authen test
        Route::namespace('App\Http\Controllers\Api\Admin')->group(function () {
            Route::get('/userdata', 'AuthController@userdata')->name('user.api');
            Route::get('/logout', 'AuthController@logout')->name('admin.logout');
        });
        // AIZ
        Route::namespace('App\Http\Controllers')->group(function () {
            Route::any('/uploaded-files/file-info', 'AizUploadController@file_info')->name('uploaded-files.info');
            Route::resource('/uploaded-files', 'AizUploadController');
            Route::get('/uploaded-files/destroy/{id}', 'AizUploadController@destroy')->name('uploaded-files.destroy');
        });
        // ADMIN
        Route::namespace('App\Http\Controllers\Api\Admin')->name('admin.')->group(function () {
            Route::get('/', 'DashboardController@index')->name('dashboard');
            Route::get('/{id}/profile', 'UserController@admin')->name('profile');
            Route::post('/{id}/update', 'UserController@adminUpdate')->name('profile.update');
            // user 
            Route::prefix('user')->name('user.')->group(function () {
                Route::resource('/', 'UserController');
                Route::post('/search', 'UserController@fillSearch')->name('fillSearch');
            });
        });
    });
});



 // // artist
        // Route::prefix('artist')->name('artist.')->group(function () {
        //     Route::resource('/', 'ArtistController', ['parameters' => ['' => 'id']]);
        //     Route::get('/{id}/artistSt', 'ArtistController@changeStatus')->name('status');
        // });
        // // feature
        // Route::prefix('feature')->name('feature.')->group(function () {
        //     Route::resource('/', 'FeatureController', ['parameters' => ['' => 'id']]);
        //     Route::get('/{id}/featureSt', 'FeatureController@changeStatus')->name('status');
        // });
        // // album
        // Route::prefix('album')->name('album.')->group(function () {
        //     Route::resource('/', 'AlbumController', ['parameters' => ['' => 'id']]);
        //     Route::post('/search', 'AlbumController@fillSearch')->name('fillSearch');
        //     Route::post('/{id}/albumSt', 'AlbumController@changeStatus')->name('status');
        // });
        // // genre
        // Route::prefix('genre')->name('genre.')->group(function () {
        //     Route::resource('/', 'GenreController', ['parameters' => ['' => 'id']]);
        //     Route::get('/{id}/genreSt', 'GenreController@changeStatus')->name('status');
        // });
        // // track
        // Route::prefix('track')->name('track.')->group(function () {
        //     Route::resource('/', 'TrackController', ['parameters' => ['' => 'id']]);
        //     Route::get('/{id}/trackSt', 'TrackController@changeStatus')->name('status');
        // });