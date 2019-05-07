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
    Route::get('/account', 'Users\UserDashboardController@index')->name('app.users.account.index');

    /**
     * User Account Settings
     */
    Route::get('/account/settings', 'Users\UserAccountsController@index')->name('app.users.account.settings.index');
    Route::patch('/account/settings', 'Users\UserAccountsController@update')->name('app.users.account.settings.update');
    Route::patch('/account/settings/demographics', 'Users\UserDemographicsController@update')->name('app.users.account.settings.demographics.update');
    Route::patch('/account/settings/contact', 'Users\UserContactInfoController@update')->name('app.users.account.settings.contact-info.update');
    Route::patch('/account/settings/military', 'Users\UserMilitaryInfoController@update')->name('app.users.account.settings.military.update');
    Route::patch('/account/settings/password', 'Users\UserPasswordController@update')->name('app.users.account.settings.password.update');

    /**
     * User Notifications
     */
    Route::get('/account/notifications', 'Users\UserNotificationsController@index')->name('app.users.account.notifications');
    Route::post('/account/notifications', 'Users\UserNotificationsController@store')->name('app.users.account.notifications');

    /**
     * User Apps
     */
    Route::get('/account/apps', 'Users\UserAppsController@index')->name('app.users.account.apps.index');

    /**
     * User Teams
     */
    Route::get('/account/teams', 'Users\UserOrganizationsController@index')->name('app.users.account.teams.index');
});
