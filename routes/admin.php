<?php

Route::get('/', 'Admin\AdminDashboardController@index')->name('app.admin.dashboard.index');
Route::get('/dashboard', 'Admin\AdminDashboardController@index')->name('app.admin.dashboard.index');


/**
 * Users
 */
Route::get('/users', 'Admin\Users\UsersController@index')->name('app.admin.users.index');
Route::post('/users', 'Admin\Users\UsersController@store')->name('app.admin.users.store');
Route::get('/users/create', 'Admin\Users\UsersController@create')->name('app.admin.users.create');
Route::get('/users/{user}', 'Admin\Users\UsersController@show')->name('app.admin.users.show');
Route::delete('/users/{user}', 'Admin\Users\UsersController@destroy')->name('app.admin.users.destroy');

/**
 * Organizations
 */
Route::get('/organizations', 'Admin\Organizations\OrganizationsController@index')->name('app.admin.organizations.index');
Route::post('/organizations', 'Admin\Organizations\OrganizationsController@store')->name('app.admin.organizations.store');
Route::get('/organizations/{organization}', 'Admin\Organizations\OrganizationsController@show')->name('app.admin.organizations.show');
Route::patch('/organizations/{organization}', 'Admin\Organizations\OrganizationsController@update')->name('app.admin.organizations.update');


/**
 * ACL
 */

// Roles
Route::get('/acl/roles', 'ACL\Roles\RolesController@index')->name('app.admin.acl.roles.index');

// Permissions
Route::get('/acl/permissions', 'ACL\Permissions\PermissionsController@index')->name('app.admin.acl.permissions.index');
Route::post('/acl/permissions', 'ACL\Permissions\PermissionsController@store')->name('app.admin.acl.permissions.store');
Route::patch('/acl/permissions/{permission}', 'ACL\Permissions\PermissionsController@update')->name('app.admin.acl.permissions.update');
Route::delete('/acl/permissions/{permission}', 'ACL\Permissions\PermissionsController@destroy')->name('app.admin.acl.permissions.destroy');

/**
 * API Clients
 */
Route::get('/developers/api', 'Admin\AdminDashboardController@api')->name('app.admin.api.index');
