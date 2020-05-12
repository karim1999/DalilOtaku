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
    Route::get('/', "AlertController@index")->name("home");
});
