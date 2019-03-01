<?php

Auth::routes(['verify' => true]);

Route::get('/', 'App\AppController@index')->name('app.index');
Route::get('/home', 'App\AppController@index')->name('home');
