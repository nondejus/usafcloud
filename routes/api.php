<?php

Route::middleware('auth:api')->group(function () {
    Route::get('/user', 'Users\UsersController@show');
    Route::get('/user/email', 'Users\UserEmailsController@show');
});
