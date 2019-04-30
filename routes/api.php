<?php

Route::middleware('auth:api')->group(function () {
    /**
     * Users
     */
    Route::get('/user', 'Users\UsersController@show');
    Route::get('/users', 'Users\UsersController@index');

    /**
     * User Email
     */
    Route::get('/user/email', 'Users\UserEmailsController@show');
    Route::post('/user/email', 'Users\UserEmailsController@update');

    Route::get('/organizations', 'Organizations\OrganizationsController@index');
});
