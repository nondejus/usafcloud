<?php

// Passport Routes are registered

Auth::routes(['verify' => true]);

Route::get('/', 'App\AppController@index')->name('app.index');
Route::get('/home', 'App\AppController@index')->name('home');
Route::get('/developers', 'App\AppController@developers')->name('app.developers.index');
