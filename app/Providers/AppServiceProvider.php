<?php

namespace App\Providers;

use App\Brand;
use App\Category;
use App\Product;
use App\SubCategory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->share('categories',Category::all());
        view()->share('products',Product::all());
        view()->share('brands',Brand::all());
        view()->share('subCategories',$subCategories = SubCategory::getSubCategories());

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
