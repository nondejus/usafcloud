<?php // prefix: /admin/

Route::middleware(['auth', 'verified'])->group(function () {

    /**
     * Dashboard
     */
    Route::redirect('/', '/admin/dashboard', 301);
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
     * User Organizations/Teams
     */
    Route::post('/users/{user}/organizations', 'App\Users\UserOrganizationsController@store')->name('app.admin.users.organizations.store');

    /**
     * Organizations
     */
    Route::get('/organizations', 'Admin\Organizations\OrganizationsController@index')->name('app.admin.organizations.index');
    Route::post('/organizations', 'Admin\Organizations\OrganizationsController@store')->name('app.admin.organizations.store');
    Route::get('/organizations/{organization}', 'Admin\Organizations\OrganizationsController@show')->name('app.admin.organizations.show');
    Route::patch('/organizations/{organization}', 'Admin\Organizations\OrganizationsController@update')->name('app.admin.organizations.update');
    Route::delete('/organizations/{organization}', 'Admin\Organizations\OrganizationsController@destroy')->name('app.admin.organizations.destroy');
    Route::post('/organizations/{organization}/members', 'Admin\Organizations\OrganizationMembersController@store')->name('app.admin.organizations.members.store');

    /**
     * GSuite Accounts
     */
    Route::get('/gsuite-accounts', 'Admin\GSuiteAccounts\GSuiteAccountsController@index')->name('app.admin.gsuite.index');

    /**
     * ACL
     */

    // Roles
    Route::get('/acl/roles', 'ACL\Roles\RolesController@index')->name('app.admin.acl.roles.index');
    Route::post('/acl/roles', 'ACL\Roles\RolesController@store')->name('app.admin.acl.roles.store');
    Route::patch('/acl/roles/{role}', 'ACL\Roles\RolesController@update')->name('app.admin.acl.roles.update');

    // Permissions
    Route::get('/acl/permissions', 'ACL\Permissions\PermissionsController@index')->name('app.admin.acl.permissions.index');
    Route::post('/acl/permissions', 'ACL\Permissions\PermissionsController@store')->name('app.admin.acl.permissions.store');
    Route::patch('/acl/permissions/{permission}', 'ACL\Permissions\PermissionsController@update')->name('app.admin.acl.permissions.update');
    Route::delete('/acl/permissions/{permission}', 'ACL\Permissions\PermissionsController@destroy')->name('app.admin.acl.permissions.destroy');

    /**
     * OAuth Clients
     */
    Route::get('/developer/apps', 'Apps\AppsController@index')->name('app.admin.api.index');
    Route::post('/developer/apps', 'Apps\AppsController@store')->name('app.admin.api.index');
    Route::get('/developer/apps/create', 'Apps\AppsController@create')->name('app.admin.api.create');
    Route::get('/developer/apps/{client}', 'Apps\AppsController@show')->name('app.admin.api.show');
});
