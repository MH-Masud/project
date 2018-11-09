<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Category;
use  App\Slider;
use App\Subslider;
use App\Manufacture;
use App\Product;
use DB;
use App\SubCategory;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('frontEnd.includes.menu',function($view){
            
           $categories = Category::where('categoryStatus',1)->get();
           $view->with('categories',$categories);

        });

        View::composer('frontEnd.includes.header',function($view){
            
            $publishedCategories = Category::where('categoryStatus', 1)->get();
            $view->with('publishedCategories',$publishedCategories);
        });

        View::composer('frontEnd.home.homeContent',function($view){

            $specialOsserPublishedProductsinRangom = DB::table('products')
                               ->where('publicationStatus',1)
                               ->where('specialOffer',1)
                               ->inRandomOrder()
                               ->limit(1)
                               ->get();
            $view->with('specialOsserPublishedProductsinRangom',$specialOsserPublishedProductsinRangom);
        });


        View::composer('frontEnd.home.homeContent',function($view){

            $publishedProductsinRangom = DB::table('products')
                               ->where('publicationStatus',1)
                               ->inRandomOrder()
                               ->limit(1)
                               ->get();
            $view->with('publishedProductsinRangom',$publishedProductsinRangom);
        });

        View::composer('frontEnd.home.homeContent',function($view){

            $allPublishedLatestProducts = DB::table('products')
                               ->where('publicationStatus',1)
                               ->limit(1)
                               ->get();
            $view->with('allPublishedLatestProducts',$allPublishedLatestProducts);
        });

        View::composer('frontEnd.home.homeContent',function($view){

            $publishedLatestProducts = DB::table('products')
                               ->where('publicationStatus',1)
                               ->latest()
                               ->limit(1)
                               ->get();
            $view->with('publishedLatestProducts',$publishedLatestProducts);
        });

        View::composer('frontEnd.home.homeContent',function($view){

            $publishedSliders = Slider::where('publicationStatus', 1)->get();

            $view->with('publishedSliders',$publishedSliders);
        });

        View::composer('frontEnd.home.homeContent',function($view){
            
            $publishedSubsliders = Subslider::where('publicationStatus', 1)->get();
            $view->with('publishedSubsliders',$publishedSubsliders);
        });

        View::composer('frontEnd.category.categoryContent',function($view){
             
            $publishedManufactures = Manufacture::where('manufactureStatus',1)->get();
            $view->with('publishedManufactures',$publishedManufactures);
        });
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
