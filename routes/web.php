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


Route::namespace('App\Http\Controllers\Frontend')->group(function(){
    // AJAX LOCATION
    Route::post('get-districts', 'AjaxController@getDistrict')->name('ajax.get.district');
    Route::post('get-wards', 'AjaxController@getWard')->name('ajax.get.ward');
    // AJAX LOADMORE HOMEPAGE
    Route::get('/', 'AjaxController@getArticles')->name('home');
    // SWITCH LANGUAGES
    Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);
    // USER
    Route::get('profile/{id}', 'UserController@profile')->name('profile');
    // SONG
    Route::get('/{id}/playlist','PlaylistController@goPlaylist')->name('playlist');
    // LIBRARY
    Route::get('library/{user_id}', 'LibraryController@library')->name('library');
    Route::get('library2', 'LibraryController@library2')->name('library2');

    Route::post('/library', 'LibraryController@addLibrary')->name('addLibrary');
    Route::delete('library/{album_id}', 'LibraryController@destroy')->name('libraryDestroy');

    // social login
    Route::get('/login', 'Auth\LoginController@login')->name('login');
    Route::Post('/login', 'Auth\LoginController@loginHandle')->name('login-handle');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


    Route::get('login/social/{provider}', 'Auth\LoginController@redirectToProvider')->name('login.social');
    Route::get('social/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('register.social.callback');

});


// Auth::routes();
// switch to ajax
// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');




// // Route::get('/{song}/playlist', [App\Http\Controllers\PlaylistController::class, 'getAudio'])->name('song');

// Route::get('/test', [App\Http\Controllers\HomeController::class, 'test'])->name('test');

