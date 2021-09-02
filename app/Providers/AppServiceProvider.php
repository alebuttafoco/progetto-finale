<?php

namespace App\Providers;

use App\Restaurant;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

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
        View::composer('layouts.admin', function ($view) {
            $id = Auth::user()->id;
            $restaurants = Restaurant::where('user_id', $id)->get();

            $view->with('restaurants',$restaurants );
        });
        
    }
}