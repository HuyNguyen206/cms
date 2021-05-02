<?php

namespace App\Providers;

use App\Category;
use App\Tag;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // Using Closure based composers...
        View::composer('frontend.components.right-sidebar', function ($view) {
            //
            $view->with('categories', Category::all());
            $view->with('tags', Tag::all());
        });
    }
}
