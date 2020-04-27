<?php

namespace App\Providers;

use App\ProductType;
use Illuminate\Support\ServiceProvider;

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
        view()->composer('partials.bakery.nav', function ($view) {
            $productTypes = ProductType::all();
            $view->with('productType', $productTypes);
        });
    }
}
