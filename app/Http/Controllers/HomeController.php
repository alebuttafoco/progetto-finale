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
        $all_profit = 0;
        $order_count = count($orders);
        $month_order = 0;
        $year_order = 0;
        $order_month = [0,0,0,0,0,0,0,0,0,0,0,0];
        $earnings_month = [0,0,0,0,0,0,0,0,0,0,0,0];
        $earnings_years = [];
        $orders_years = [];
        foreach ($orders as $order) {

            // ALL PROFIT
            $all_profit += $order->total_price;


            //ORDER ON THIS MONTH
            if ((Carbon::parse($order->date)->format('m') === (Carbon::now()->format('m')))) {
                $month_order += 1;
            }


            //ORDER ON THIS YEAR
            if ((Carbon::parse($order->date)->format('y') === (Carbon::now()->format('y')))) {
                $year_order += 1;
            }


            //ORDER ON CURRENT MONTH
            if ((Carbon::parse($order->date)->format('y') === (Carbon::now()->format('y')))) {
                $mese = (int)Carbon::parse($order->date)->format('m') -1;
                $valore = $order_month[$mese] +1; 
                $order_month[$mese] = $valore;   
            }


            //EARNING ON CURRENT MONTH
            if ((Carbon::parse($order->date)->format('y') === (Carbon::now()->format('y')))) {
                $mese = (int)Carbon::parse($order->date)->format('m') -1;
                $valore = $earnings_month[$mese] +$order->total_price; 
                $earnings_month[$mese] = $valore;
            }


            //EARNING FOR YEAR
            if (!(array_key_exists(Carbon::parse($order->date)->format('Y'), $earnings_years))) {
                $year = Carbon::parse($order->date)->format('Y');
                $earnings_years += [$year => 0];
            }else{
            $year = Carbon::parse($order->date)->format('Y');
            $valore = $earnings_years[$year] + $order->total_price;
            $earnings_years[$year] = $valore;
            }


            //ORDERS FOR YEAR
            if (!(array_key_exists(Carbon::parse($order->date)->format('Y'), $orders_years))) {
                $year = Carbon::parse($order->date)->format('Y');
                $orders_years += [$year => 0];
            }else{
            $year = Carbon::parse($order->date)->format('Y');
            $valore = $orders_years[$year] + 1;
            $orders_years[$year] = $valore;
            }

        };

        //EARNINGS FOR YEAR
        ksort($earnings_years);
        $earnings_years_key = [];
        $earnings_years_value = [];
        foreach ($earnings_years as $key => $value) {
            array_push($earnings_years_key, $key);
            array_push($earnings_years_value, $value);
        }

        //ORDERS FOR YEAR
        ksort($orders_years);
        $orders_years_key = [];
        $orders_years_value = [];
        foreach ($orders_years as $key => $value) {
            array_push($orders_years_key, $key);
            array_push($orders_years_value, $value);
        }

        //EARNING FOR YEARS
        $earnings_years_value = json_encode($earnings_years_value);
        $earnings_years_key = json_encode($earnings_years_key);

        //ORDERS FOR YEAR
        $orders_years_value = json_encode($orders_years_value);
        $orders_years_key = json_encode($orders_years_key);

        //EARNON ON CURRENT MONTH
        $earnings_month = json_encode($earnings_month);

        //ORDER ON THIS MONTH
        $order_month = json_encode($order_month);
        return view('admin.statistiche', compact('all_profit', 'order_count', 'month_order', 'year_order', 'order_month', 'earnings_month', 'earnings_years_key', 'earnings_years_value', 'orders_years_value', 'orders_years_key'));
    }


    // public function ControlloPost(Request $request){
    //     ddd($request->all()); /* DIE DUMP DEBUG della verifica del FORM del carrello */
    // };
}