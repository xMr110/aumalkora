<?php
/**
 * Created by PhpStorm.
 * User: MrDark
 * Date: 12/14/2018
 * Time: 07:42 م
 */


Route::get('/', function (){

    return view('admin.dashboard');
})->name('dashboard');

Route::resource('settings', 'SettingController', [
    'only' => ['index', 'store']
]);
Route::get('OurProduct/Manage','SettingController@OurProduct');
Route::get('Panel/Manage','SettingController@Panel');
Route::get('AboutUs/Manage','SettingController@AboutUs');




Route::resource('user','UserController');
Route::resource('album','AlbumController');
Route::resource('image', 'AlbumImagesController');
Route::resource('slider','SliderController');
Route::post('slide/active/{slide}','SliderController@active');
Route::resource('category','CategoryController');
Route::resource('product','ProductController');
Route::resource('job','JobController');
Route::resource('request','JobRqtsController');
Route::post('product/active/{product}','ProductController@active');