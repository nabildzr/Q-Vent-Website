<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
        // super_admin
        Gate::define('isSuperAdmin', fn(User $user) => $user->role === 'super_admin');

        // admin
        Gate::define('isAdmin', fn(User $user) => $user->role === 'admin');

        // super_admin + admin
        Gate::define(
            'isSuperOrAdmin',
            fn(User $user) =>
            in_array($user->role, ['super_admin', 'admin'])
        );
    }
}
