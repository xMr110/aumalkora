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


Route::resource('user','UserController');