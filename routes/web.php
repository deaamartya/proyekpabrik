<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/logout', 'HomeController@logout')->name('logout');

Route::get('/change-password',function(){
	return view('changepass');
})->middleware('auth');

Route::post('/change-password','HomeController@changepass')->middleware('auth');