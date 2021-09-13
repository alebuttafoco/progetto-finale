<?php

namespace App\Http\Controllers;

use App\Mail\CompleteOrderUserMail;
use App\Order;
use App\Restaurant;
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
            //qui vado a fare il controllo dei dati e gli metto nel db

            $validated = $request->validate([
                'customer_name'=> 'required',
                'customer_lastname'=> 'required',
                'customer_email'=> 'required',
                'customer_address'=> 'required',
                'customer_phone'=> 'required',
                'total'=> 'required|numeric',
                'status'=> 'required',
                'dateNow'=> 'required|date',
            ]);       

            $dbOrder = new Order();
            $dbOrder->customer_name   = $validated['customer_name'];
            $dbOrder->customer_lastname   = $validated['customer_lastname'];
            $dbOrder->customer_address   = $validated['customer_address'];
            $dbOrder->status   = $validated['status'];
            $dbOrder->date   = $validated['dateNow'];
            $dbOrder->total_price   = $validated['total'];
            $dbOrder->save();
           
            //Bisogna creare la relazione nel database tra l'ordine e i piatti
            // $dbOrder->plates()->attach($order);
            // $plates = collect($order)->map(function ($plate){
            //     return ['quantity' => $plate->qty];
            // });
            
            // $dbOrder->plates()->sync($plates);

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
            //qui trasmetto l'errore
        }
    }
}