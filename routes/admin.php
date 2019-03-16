<?php

Route::get('/', 'Admin\AdminDashboardController@index')->name('app.admin.dashboard.index');
Route::get('/dashboard', 'Admin\AdminDashboardController@index')->name('app.admin.dashboard.index');


/**
 * Users
 */
Route::get('/users', 'Admin\Users\UsersController@index')->name('app.admin.users.index');

/**
 * ACL
 */

// Roles
Route::get('/acl/roles', 'ACL\Roles\RolesController@index')->name('app.admin.acl.roles.index');

// Permissions
Route::get('/acl/permissions', 'ACL\Permissions\PermissionsController@index')->name('app.admin.acl.permission.index');
