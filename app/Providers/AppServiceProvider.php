<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use App\Models\User;
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
        Blade::if('ifadmin', function (?User $user) {
            return $user && $user->isAdmin();
        });
    }
}
