<?php

namespace App\Providers;


use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
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

        Gate::define('admin', function () {

            // If there is no authenticated user
            // below returns false

            // If there is an authenticated user
            // with a username different from
            // 'chrisser' it returns false

            // If there is an authenticated user
            // and this user has the username
            // chrisser then it returns true
           return auth()->user()?->username == 'chrisser';

        });

        Blade::if('admin', function() {

        // If the authenticated user's username is
        // chrisser then return true
        return (auth()->user()->username == 'chrisser');

        });







    }
}
