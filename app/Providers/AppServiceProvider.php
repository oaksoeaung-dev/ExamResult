<?php

namespace App\Providers;

use App\Helpers\BadgeColorFormatter;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $view->with('badgeColorFormatter', new BadgeColorFormatter());
        });

        Gate::define("canCreate", function (User $user) {
            return $user->role->id === 1;
        });
    }
}
