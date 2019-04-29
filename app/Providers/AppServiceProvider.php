<?php

namespace App\Providers;

use App\Models\User\User;
use Laravel\Passport\Passport;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;
use App\Observers\OrganizationsObserver;
use App\Models\App\Organizations\Organization;

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
    }
}
