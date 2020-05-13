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

Route::get('/', "HomeController@index")->name("home");
Route::get('/contact', "ContactController@index")->name("contact");
Route::get('/who', "WhoController@index")->name("who");
Route::get('/faq', "FaqController@index")->name("faq");
Route::get('/news', "NewsController@index")->name("news");
Route::get('/policy', "PolicyController@index")->name("policy");
Route::get('/terms', "TermsController@index")->name("terms");
Route::get('/calendar', "CalendarController@index")->name("calendar");

Auth::routes();


//Admin Routes
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
    Route::name('alert.')->prefix('alert')->group(function(){
        Route::get('/', "AlertController@index")->name("form");
        Route::put('/action', "AlertController@action")->name("action");
    });
    Route::name('terms.')->prefix('terms')->group(function(){
        Route::get('/', "TermsController@index")->name("form");
        Route::put('/action', "TermsController@action")->name("action");
    });
    Route::name('policy.')->prefix('policy')->group(function(){
        Route::get('/', "PolicyController@index")->name("form");
        Route::put('/action', "PolicyController@action")->name("action");
    });
    Route::name('settings.')->prefix('settings')->group(function(){
        Route::get('/', "SettingController@index")->name("form");
        Route::put('/action', "SettingController@action")->name("action");
    });

    Route::resource('animes', 'AnimeController');
    Route::resource('categories', 'CategoryController');
    Route::resource('faq', 'FaqController');
    Route::resource('sources', 'SourceController');
    Route::resource('studios', 'StudioController');
    Route::resource('users', 'UserController');

});
