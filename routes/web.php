<?php

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
Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);
Route::get('/', 'SiteController@index');
Route::get('category/{category}', 'SiteController@category');
Route::get('/categories', 'SiteController@all');
Route::get('/gallery','SiteController@gallery');
Route::get('/product/{product}','SiteController@show');

Route::get('/about','SiteController@about');
Route::get('/speech','SiteController@speech');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Admin Area
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    require_once base_path('routes/admin.php');
});