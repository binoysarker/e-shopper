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
        view()->share('featureProduct',Product::where('Is_featured',1)->get());
        view()->share('brands',Brand::all());
        view()->share('subCategories',$subCategories = SubCategory::getSubCategories());
        view()->share('getProductsByBrand',$getProductsByBrand = Product::getProductsByBrand());
        view()->share('getProductsByCategory',$getProductsByCategory = Category::getProductsByCategory());
        view()->share('getRecommendedProduct',$getRecommendedProduct = Product::getRecommendedProduct());

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
