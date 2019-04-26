<?php

Auth::routes(['verify' => true]);

Route::view('/', 'app.index')->name('app.index')->middleware('auth');
Route::view('/home', 'app.index')->name('app.home')->middleware('auth');

/**
 * User Account Dashboard
 */
Route::get('/account', 'App\Users\UserAccountsController@show')->name('app.users.account.index');

/**
 * User Account Settings
 */
Route::get('/account/settings', 'App\Users\UserSettingsController@show')->name('app.users.account.settings.index');
Route::patch('/account/settings', 'App\Users\UserAccountsController@update')->name('app.users.account.settings.update');

/**
 * User Notifications
 */
Route::get('/account/notifications', 'App\Users\UserNotificationsController@index')->name('app.users.account.notifications');
Route::post('/account/notifications', 'App\Users\UserContactInfoController@update')->name('app.users.contact-info.update');

/**
 * User Apps
 */
Route::get('/account/apps', 'App\Users\UserAppsController@index')->name('app.users.account.apps.index');

/**
 * User Teams
 */
Route::get('/account/teams', 'App\Users\UserOrganizationsController@index')->name('app.users.account.teams.index');

/**
 * New User Invitiations
 */
Route::get('/login/{user}/invitation', 'App\Users\UserInvitationsController@show')->name('login.invitation');
Route::post('/login/{user}/invitation', 'App\Users\UserInvitationsController@update')->name('login.invitation');
