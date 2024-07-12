<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;
use Illuminate\Pagination\Paginator;
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
        // \URL::forceScheme('https');
        Paginator::useBootstrap();
        Schema::defaultStringLength(191);
        Blade::if('can', function ($expression,$type='admin') {
            return  auth('admin')->user()->hasAccess($expression);
           
        });
    }
}
