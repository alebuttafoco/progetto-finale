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

    
    public function user()
    {
        return view('user');
    }

    public function ordini()
    {
        $user_id = Auth::id();
        $restaurant = Restaurant::where('user_id', $user_id)->first();
        $restaurant_id = $restaurant->id;
        $plates = Plate::where('restaurant_id', $restaurant_id)->with('orders')->get(); //qui ho i piatti del ristorante del utente


        //ddd($plates[0]->orders[0]->pivot->quantity, $plates[0]->orders[0]->id, Order::find(1)->plates);
        //ddd(count($plates));
        
        //$plates -> contiene i piatti del ristorante
        //$plates[0]->orders -> prendo il primo piatto e vado a vedere gli ordini che ha associati
        //$plates[0]->orders[0]->pivot -> vado a prendere il primo ordine del piatto e vado a prenedre le tabelle pivot collegate
        //$plates[0]->orders[0]->pivot->quantity dalla tabella pivot prendo il valore della quantita

        $order_id = [];

        foreach ($plates as $plate) {
            foreach ($plate->orders as $order) {
                array_push($order_id, $order->id);
            }
        }

        $unique_id = array_unique($order_id);

        $orders = Order::whereIn('id', $unique_id)->get();
        //ddd($orders);
        
        return view('admin.ordini', compact('orders'));
    }

    public function statistiche()
    {
        return view('admin.statistiche');
    }

}