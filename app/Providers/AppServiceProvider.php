<?php

namespace App\Providers;
use DB;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $settings=DB::table('settings')->first();
        view()->share('setting', $settings);

        //for pagination
        Paginator::useBootstrap();
    }
}
