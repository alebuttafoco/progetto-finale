<?php

namespace App\Http\Controllers;

use App\Restaurant;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function showRestaurant(Restaurant $restaurant)
    {
        return view('restaurants.show', compact('restaurant'));
    }
}