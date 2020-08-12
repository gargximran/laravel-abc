<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Backend\Logo;
use App\Models\Backend\Fav;

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
        // View::share('logos', logo::orderBy('id','asc')->get() );
        // View::share('favs', Fav::orderBy('id','asc')->get() );
    }
}
