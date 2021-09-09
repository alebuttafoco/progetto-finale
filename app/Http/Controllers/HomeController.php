<?php

namespace App\Http\Controllers;

use App\Order;
use App\Plate;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function datiOrdini()
    {
        $user_id = Auth::id();
        $restaurant = Restaurant::where('user_id', $user_id)->first();
        $restaurant_id = $restaurant->id;
        $plates = Plate::where('restaurant_id', $restaurant_id)->with('orders')->get(); //qui ho i piatti del ristorante del utente

        $order_id = [];

        foreach ($plates as $plate) {
            foreach ($plate->orders as $order) {
                array_push($order_id, $order->id);
            }
        }

        $unique_id = array_unique($order_id);

        $orders = Order::whereIn('id', $unique_id)->get();
        return $orders;
    }
    
    public function user()
    {
        return view('user');
    }

    public function ordini()
    {
        
        $orders = $this->datiOrdini();
        return view('admin.ordini', compact('orders'));
    }



    public function showOrdini($id)
    {
        $order = Order::find($id);
        return view('admin.showOrdini', compact('order'));
    }





    public function statistiche()
    {

        $orders = $this->datiOrdini();
        



        return view('admin.statistiche');
    }

}