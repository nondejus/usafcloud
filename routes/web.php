<?php

Auth::routes(['verify' => true]);

Route::view('/', 'app.index')->name('app.index')->middleware('auth');
Route::view('/home', 'app.index')->name('app.home')->middleware('auth');

Route::get('/account', 'App\Users\UserAccountsController@show')->name('app.users.account.show');
Route::patch('/account', 'App\Users\UserAccountsController@update')->name('app.users.account.update');
Route::get('/account/notifications', 'App\Users\UserNotificationsController@index')->name('app.users.account.notifications');
Route::post('/account/notifications', 'App\Users\UserContactInfoController@update')->name('app.users.contact-info.update');

Route::get('/login/{user}/invitation', 'App\Users\UserInvitationsController@show')->name('login.invitation');
Route::post('/login/{user}/invitation', 'App\Users\UserInvitationsController@update')->name('login.invitation');
