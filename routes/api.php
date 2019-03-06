<?php

Route::middleware('auth:api')->group(function () {
    Route::get('/user', 'UsersController@show');
    Route::get('/user/email', 'UserEmailsController@show');
});
