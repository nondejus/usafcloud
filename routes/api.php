<?php

Route::middleware('auth:api')->group(function () {
    /**
     * User
     */
    Route::get('/user', 'Users\UsersController@show');

    /**
     * User Email
     */
    Route::get('/user/email', 'Users\UserEmailsController@show');
    Route::post('/user/email', 'Users\UserEmailsController@update');
});
