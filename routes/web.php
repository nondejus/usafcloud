<?php

// Passport Routes are registered

Auth::routes(['verify' => true]);

Route::get('/', 'App\AppController@index')->name('app.index');
Route::get('/home', 'App\AppController@index')->name('app.home');
Route::get('/account', 'App\Users\UserAccountsController@show')->name('app.users.account.show');
Route::patch('/account', 'App\Users\UserAccountsController@update')->name('app.users.account.update');

Route::get('/developers', 'App\AppController@developers')->name('app.developers.index');
