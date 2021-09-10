<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
//use Braintree\Gateway;
use Braintree\Gateway as Gateway;
use Braintree\Transaction as Transaction;
use Illuminate\Http\Response;
use App\Http\Requests\OrderRequest;

class CheckoutController extends Controller
{
    public function generate(Request $request, Gateway $gateway)
    {
        $clientToken = $gateway->clientToken()->generate();
        $data = [
            'success' => true,
            'token' => $clientToken,
        ];

        $response = response()
            ->json($data, 200, array('Content-Type' => 'application/javascript'))
            ->setCallback($request->input('callback'));

        return view('checkout', compact('clientToken', 'response'));
    }


    public function checkout(Request $request, Gateway $gateway)
    {
        //ddd($request->all(), $request->_token, $gateway);
        // Inserire l'ordine che verrà inviato dal cart al checkout con tutte le info.
        // l'ordine dovrà contenere anche le info del cliente che verranno richieste
        $request = $gateway->transaction()->sale([
            'amount' => "100", // qui inserire per esempio order->total
            'paymentMethodNonce' => 'fake-valid-nonce', //questo non bisogna toccarlo lo genera lui
            'options' => [
                'submitForSettlement' => true
            ]
        ]);


        if ($request->success) {
            $data = [
                'success' => true,
                'message' => "Transazione eseguita con Successo!"
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'success' => false,
                'message' => "Transazione Fallita!"
            ];
            return response()->json($data, 401);
        }
    }
}