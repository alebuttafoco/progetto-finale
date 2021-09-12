<?php

namespace App\Providers;


use App\Restaurant;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
        View::composer('layouts.admin', function ($view) {
            $id = Auth::user()->id;
            $restaurants = Restaurant::where('user_id', $id)->get();

            $view->with('restaurants', $restaurants);
        });

        //  $this->app->singleton(Gateway::class, function ($app) {
        //      return new Gateway(
        //          [
        //              'environment' => 'sandbox',
        //              'merchantId' => 'z86jw3pc8hyfbs36',
        //              'publicKey' => 'rz9cmqzvnkhx85x5',
        //              'privateKey' => 'd00be3bb256d8e88124bc8b8a7c5fbd2'
        //          ]
        //      );
        //  });

        //  \Braintree\Configuration::environment(env('BT_ENV'));
        //  \Braintree\Configuration::merchantId(env('BT_MERCHANT_ID'));
        //  \Braintree\Configuration::publicKey(env('BT_PUBLIC_KEY'));
        //  \Braintree\Configuration::privateKey(env('BT_PRIVATE_KEY'));
    }
}