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

Route::group(['prefix' => 'admin/api'], function () {
    // uploaded files
    Route::namespace('App\Http\Controllers')->group(function(){
        Route::any('/uploaded-files/file-info', 'AizUploadController@file_info')->name('uploaded-files.info');
        Route::resource('/uploaded-files', 'AizUploadController');
        Route::get('/uploaded-files/destroy/{id}', 'AizUploadController@destroy')->name('uploaded-files.destroy');
    });
    
    // Route::namespace('App\Http\Controllers\Api\Admin')->group(function(){
    //     Route::get('/', 'DashboardController@index')->name('admin.dashboard');
    // });

});
