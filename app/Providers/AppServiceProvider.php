<?php

namespace App\Providers;


use App\Restaurant;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Braintree\Gateway;
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

        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => '893hk4q3nhrs4wgj',
                    'publicKey' => '8sy7jmk9hsk32j8t',
                    'privateKey' => '1829f63749b878b0099d782ab9e9ab03'
                ]
            );
        });

        \Braintree\Configuration::environment(env('BRAINTREE_ENV'));
        \Braintree\Configuration::environment(env('BRAINTREE_ENV'));
        \Braintree\Configuration::merchantId(env('BRAINTREE_MERCHANT_ID'));
        \Braintree\Configuration::publicKey(env('BRAINTREE_PUBLIC_KEY'));
        \Braintree\Configuration::privateKey(env('BRAINTREE_PRIVATE_KEY'));
    }
}