<?php

namespace App\Providers;

use App\Models\User\User;
use Laravel\Passport\Passport;
use App\Observers\UserObserver;
use App\Models\GSuite\GSuiteAccount;
use Illuminate\Support\ServiceProvider;
use App\Observers\GSuiteAccountObserver;
use App\Observers\OrganizationsObserver;
use App\Models\Organizations\Organization;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Passport::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Organization::observe(OrganizationsObserver::class);
        GSuiteAccount::observe(GSuiteAccountObserver::class);
    }
}
