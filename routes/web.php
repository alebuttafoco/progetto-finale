<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PageController@home')->name('home');
Route::get('restaurants/{id}', 'PageController@showRestaurant')->name('restaurant.show');

Route::get('/cart', 'PageController@cart')->name('cart');

Auth::routes();
Route::get('/user', 'HomeController@user')->name('user');

Route::resource('restaurant', RestaurantController::class);
Route::resource('plate', PlateController::class);

Route::get('/ordini', 'HomeController@ordini' )->name('ordini');
Route::get('/statistiche', 'HomeController@statistiche' )->name('statistiche');