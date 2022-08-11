<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Srmklive\PayPal\Services\ExpressCheckout;

class papPalController extends Controller
{
  
    public function goPayment(){

        return view('payment.index');
 
     }
     public function payment()
     {
         $data = [];
         $data['items'] = [
             [
                 'name' => 'hotels',
                 'price' => 1000,
                 'desc'  => 'hotels in minia',
                 'qty' => 1
             ]
         ];
 
         $data['invoice_id'] = 1;
         $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
         $data['return_url'] = route('payment.success');
         $data['cancel_url'] = route('payment.cancel');
         $data['total'] = 1000;
 
         $provider = new ExpressCheckout;
 
         $response = $provider->setExpressCheckout($data);
 
         $response = $provider->setExpressCheckout($data, true);
 
         return redirect($response['paypal_link']);
     }
 
     public function cancel()
     {
         dd("Your payment is canceled.");
     }
 
     public function success(Request $request)
     {
         $provider = new ExpressCheckout;
         $response = $provider->getExpressCheckoutDetails($request->token);
 
         if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
             dd('Your payment was successfully.');
         }
 
         dd('Please try again later.');
     }
}


