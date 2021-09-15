<?php

namespace App\Http\Controllers;

use App\Order;
use App\Plate;
use App\Restaurant;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\Factory;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function datiOrdini($type)
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

        if ($type == 'all') {
         return $orders = Order::whereIn('id', $unique_id)->orderBy('id', 'desc')->get();
            
        }
        
        return $orders = Order::whereIn('id', $unique_id)->orderBy('id', 'desc')->paginate(10);
    }
    
    public function user()
    {
        return view('user');
    }

    public function ordini()
    {
        $orders = $this->datiOrdini("paginate");
        //ddd($orders);
        return view('admin.ordini', compact('orders'));
    }



    public function showOrdini($id)
    {
        $order = Order::find($id);
        return view('admin.showOrdini', compact('order'));
    }





    public function statistiche()
    {

        $orders = $this->datiOrdini("all");
        //ddd($orders);
        $all_profit = 0;
        $order_count = count($orders);
        $month_order = 0;
        $year_order = 0;
        foreach ($orders as $order) {
            //all profit 
            $all_profit += $order->total_price;
            //order on this month
            if ((Carbon::parse($order->date)->format('m') === (Carbon::now()->format('m')))) {
                $month_order += 1;
            }
            //order on this year
            if ((Carbon::parse($order->date)->format('y') === (Carbon::now()->format('y')))) {
                $year_order += 1;
            }

            
        }


        return view('admin.statistiche', compact('all_profit', 'order_count', 'month_order', 'year_order'));
    }


    public function ControlloPost(Request $request){
        ddd($request->all()); /* DIE DUMP DEBUG della verifica del FORM del carrello */
    }
}