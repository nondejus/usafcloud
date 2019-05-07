<?php

Auth::routes(['verify' => true]);

/**
 * New User Invitiations
 */
Route::get('/login/{user}/invitation', 'Auth\UserInvitationsController@show')->name('login.invitation');
Route::post('/login/{user}/invitation', 'Auth\UserInvitationsController@update')->name('login.invitation');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::view('/', 'app.index')->name('app.index');
    Route::view('/home', 'app.index')->name('app.home');

    /**
     * User Account Dashboard
     */
    Route::get('/account', 'App\Users\UserAccountsController@show')->name('app.users.account.index');

    /**
     * User Account Settings
     */
    Route::get('/account/settings', 'App\Users\UserSettingsController@show')->name('app.users.account.settings.index');
    Route::patch('/account/settings', 'App\Users\UserAccountsController@update')->name('app.users.account.settings.update');
    Route::patch('/account/settings/demographics', 'App\Users\UserDemographicsController@update')->name('app.users.account.settings.demographics.update');
    Route::patch('/account/settings/contact', 'App\Users\UserContactInfoController@update')->name('app.users.account.settings.contact-info.update');
    Route::patch('/account/settings/military', 'App\Users\UserMilitaryInfoController@update')->name('app.users.account.settings.military.update');
    Route::patch('/account/settings/password', 'App\Users\UserPasswordController@update')->name('app.users.account.settings.password.update');

    /**
     * User Notifications
     */
    Route::get('/account/notifications', 'App\Users\UserNotificationsController@index')->name('app.users.account.notifications');
    Route::post('/account/notifications', 'App\Users\UserNotificationsController@store')->name('app.users.account.notifications');

    /**
     * User Apps
     */
    Route::get('/account/apps', 'App\Users\UserAppsController@index')->name('app.users.account.apps.index');

    /**
     * User Teams
     */
    Route::get('/account/teams', 'App\Users\UserOrganizationsController@index')->name('app.users.account.teams.index');
});
