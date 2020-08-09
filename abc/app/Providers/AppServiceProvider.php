<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Order;
use View;
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
        //
            View::composer('admin.admin_master', function ($view) {
            $orderRequest=Order::where('orderStatus','pendding')->count();
             $view->with('orderRequest', $orderRequest);
         });
    }
}
