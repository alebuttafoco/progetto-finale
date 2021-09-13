<?php

namespace App\Http\Controllers;
use App\Order;
use App\Restaurant;
use App\Plate;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    // public function showRestaurant(Request $request)
    // {
    //     //ddd($request->id);
    //     $restaurant=Restaurant::find($request->id);
    //     $plates=Plate::all();
    //     //ddd($plates);
    //     return view('restaurants.show', compact('restaurant', 'plates'));
    // }

    public function showCart(Order $order) //Ricordarsi di cambiare il modello dall'ordine "into" carrello
    {
        return view('cart', compact('order'));
    }


    public function confirm()
    {
        return view('confirm');
    }
}