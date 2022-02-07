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
    // user
    Route::prefix('user')->name('user.')->group(function () {
        Route::resource('/', 'UserController', ['parameters' => ['' => 'id']]);
        Route::post('/search', 'UserController@fillSearch')->name('fillSearch');
    });
    // feature 
    Route::prefix('feature')->name('feature.')->group(function () {
        Route::resource('/', 'FeatureController', ['parameters' => ['' => 'id']]);
        Route::get('status/{id}', 'FeatureController@changeStatus')->name('status');
        Route::post('search', 'FeatureController@fillSearch')->name('fillSearch');
    });
});
