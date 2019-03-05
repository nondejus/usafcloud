<?php

use Illuminate\Http\Request;
use App\Models\Auth\User;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return User::get()->first();
});

Route::middleware('auth:api')->get('/user/email', function (Request $request) {
    return User::get()->first()->email;
});
