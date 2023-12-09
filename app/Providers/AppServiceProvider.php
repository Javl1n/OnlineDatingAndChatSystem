<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Blade;

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
        Model::unguard();

        Blade::if('mine', function (int $id) {
            return $id === auth()->user()->id;
        });

        Blade::if('verified', function () {
            return auth()->user()->isVerified();
        });

        Blade::if('admin', function () {
            return auth()->user()->isAdmin();
        });
    }
}
