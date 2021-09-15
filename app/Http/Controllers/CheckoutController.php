<?php

namespace App\Http\Controllers;

use App\Mail\CompleteOrderUserMail;
use App\Order;
use App\Restaurant;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{

    public function pay(Request $request)
    {
        //devo generare il token e mandarlo alla pagina del pagamento 

        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
      
        $token = $gateway->ClientToken()->generate();
        $total =  $request->total;
        // $additional_features = $request->get('additionals_features');
        //ddd($request->all(), $request);

        // ddd( $request->total, $token);

        return view('payPage', compact('token', 'total'));

    }



    public function confirmedPay(Request $request )
    {

        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $order = json_decode($request->inputOrder);
        $total = $request->total;
        $result = $gateway->transaction()->sale([
            'amount' => $total,
            'paymentMethodNonce' => 'fake-valid-nonce',
            'customer' => [
                'firstName' => 'Customer Name',
                'lastName' => 'Customer Lastname',
                'email' => 'Customer@email.com',
            ],
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
        
        //ddd($result->transaction ,$result->success, $request, $request->all(), json_decode($request->inputOrder));

        if ($result->success) {
            

            //validate data from request
            $validated = $request->validate([
                'customer_name'=> 'required',
                'customer_lastname'=> 'required',
                'customer_email'=> 'required',
                'customer_address'=> 'required',
                'customer_phone'=> 'required|numeric',
                'total'=> 'required|numeric',
                'status'=> 'required',
                'dateNow'=> 'required|date',
            ]);       

            //create a new object Order
            $dbOrder = new Order();
            $dbOrder->customer_name   = $validated['customer_name'];
            $dbOrder->customer_lastname   = $validated['customer_lastname'];
            $dbOrder->customer_address   = $validated['customer_address'];
            $dbOrder->status   = $validated['status'];
            $dbOrder->date   = $validated['dateNow'];
            $dbOrder->total_price   = $validated['total'];
            $dbOrder->save();
           
            

            //populate pivot table order_plate
            foreach ($order as $item) {
                $dbOrder->plates()->attach($item->id, ['quantity' => $item->qty]);
            }

            //take data to pass on email
            $restaurant_id = $order[0]->restaurant_id;
            $restaurant = Restaurant::find($restaurant_id);
            $data = [
                'customer_name' => $validated['customer_name'],
                'customer_lastname' => $validated['customer_lastname'],
                'customer_email' => $validated['customer_email'],
                'customer_phone' => $validated['customer_phone'],
                'customer_address' => $validated['customer_address'],
                'dateNow'=> $validated['dateNow'],
                'total_price'=> $validated['total'],
                'orders'=> $order,
                'restaurant' => $restaurant, 
                ];

            Mail::to($request->customer_email)->send(new CompleteOrderUserMail($data));

            



            return redirect()->route('confirm');

        }else{
            return back()->with('message', 'Si è verificato un errore la preghiamo di riprovare!');
        }
    }
}