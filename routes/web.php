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
//Theme
Route::get('/switch', "ThemeController@switch")->name("theme.switch");


//Home
Route::get('/', "HomeController@index")->name("home");
Route::get('/home', "HomeController@index");
Route::get('/all', "HomeController@all")->name("home.all");
Route::get('/airing', "HomeController@airing")->name("airing");
Route::get('/search', "SearchController@search")->name("search");

//Contact
Route::get('/contact', "ContactController@index")->name("contact");
Route::post('/contact', "ContactController@send")->name("contact.send");

Route::get('/who', "WhoController@index")->name("who");
Route::get('/faq', "FaqController@index")->name("faq");
Route::get('/news', "NewsController@index")->name("news");

//News
Route::get('/news/twitter/{id}', "NewsController@twitter")->name("news.twitter");
Route::get('/news/website/{id}', "NewsController@website")->name("news.website");

Route::get('/policy', "PolicyController@index")->name("policy");
Route::get('/terms', "TermsController@index")->name("terms");
Route::get('/calendar', "CalendarController@index")->name("calendar");

//Animes
Route::get('genre/{id}', "GenreController@show")->name("genre.show");
Route::get('type/{type}', "TypeController@show")->name("type.show");
Route::get('season/{year}/{season}', "SeasonController@year")->name("year.season.show");
Route::get('season/{season}', "SeasonController@show")->name("season.show");

//Profile
Route::prefix('profile')->name('profile.')->middleware(['auth'])->group(function () {
    Route::get('/settings', 'ProfileController@settings')->name("settings");
    Route::post('/settings', 'ProfileController@edit')->name("edit");
    Route::get('/watching', 'ProfileController@watching')->name("watching");
    Route::get('/watched', 'ProfileController@watched')->name("watched");
    Route::get('/later', 'ProfileController@later')->name("later");
    Route::get('/favorites', 'ProfileController@favorites')->name("favorites");
    Route::get('/bookmarked', 'ProfileController@bookmarked')->name("bookmarked");
});

Route::get('/add/{anime_id}/bookmarks', 'AddController@add_bookmarks')->name("add.bookmarks");
Route::get('/add/{anime_id}/favorites', 'AddController@add_favorites')->name("add.favorites");
Route::get('/add/{anime_id}/watching/{status}', 'AddController@add_watching')->name("add.watching");


//Auth
Auth::routes();
Route::get('/logout', "Auth\LoginController@logout");

Route::get('/admin/fetch_data_from_server', "Admin\AnimeController@fetch_data_from_server")->name("admin.anime.fetch_data_from_server");
//Admin Routes
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware(['auth', 'can:access admin'])->group(function () {
    Route::get('/', "AlertController@index")->name("home");
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

    //Animes
    Route::resource('animes', 'AnimeController')->except(["create", "show"]);
    Route::get('animes/published', 'AnimeController@published')->name("animes.published");
    Route::get('animes/airing', 'AnimeController@airing')->name("animes.airing");
    Route::get('fetch', 'AnimeController@fetch');
    Route::post('animes/addbatch', 'AnimeController@addbatch');
    Route::get('animes/{id}/enable', 'AnimeController@enable')->name("animes.enable");

    //Genres
    Route::resource('genres', 'GenreController');
    Route::get('genres/{id}/enable', 'GenreController@enable')->name("genres.enable");

    //FAQ
    Route::resource('questions', 'QuestionController');

    //Banned
    Route::get('banned', 'BannedController@animes')->name("banned.animes");
    Route::get('banned/genres', 'BannedController@genres')->name("banned.genres");

    //News Sources
    Route::resource('sources', 'SourceController');

    //Studios
    Route::resource('studios', 'StudioController');

    Route::resource('users', 'UserController');

    Route::resource('scripts', 'ScriptController')->only(['store', 'update']);
    Route::get('scripts/{id}/destroy', 'ScriptController@destroy')->name('scripts.destroy');

    Route::resource('websites', 'WebsiteController')->only(['store', 'update']);
    Route::get('websites/{id}/destroy', 'WebsiteController@destroy')->name('websites.destroy');
});
