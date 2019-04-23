<?php

namespace App\Providers;

use App\Models\User\User;
use App\Policies\UsersPolicy;
use Laravel\Passport\Passport;
use App\Policies\OrganizationsPolicy;
use App\Models\App\Organizations\Organization;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UsersPolicy::class,
        Organization::class => OrganizationsPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
    }
}
