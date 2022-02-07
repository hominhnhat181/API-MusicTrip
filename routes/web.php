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

Route::namespace('App\Http\Controllers')->group(function(){
    Route::post('/aiz-uploader', 'AizUploadController@show_uploader');
    Route::post('/aiz-uploader/upload', 'AizUploadController@upload');
    Route::get('/aiz-uploader/get_uploaded_files', 'AizUploadController@get_uploaded_files');
    Route::post('/aiz-uploader/get_file_by_ids', 'AizUploadController@get_preview_files');
    Route::get('/aiz-uploader/download/{id}', 'AizUploadController@attachment_download')->name('download_attachment');
});


Route::get('/sd', function () {
    return view('welcome');
});


