<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request ,$price){
        $price= decrypt($price);
        $curl = curl_init();
        $order_id = time();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://ap-gateway.mastercard.com/api/nvp/version/61',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => "apiOperation=CREATE_CHECKOUT_SESSION&apiPassword=7155fe65a07aa41191ba2f4f783f6f2c&apiUsername=merchant.TEST7500000100&merchant=TEST7500000100&interaction.operation=PURCHASE&order.id=$order_id&order.amount=$price&order.currency=USD&order.description=..",
        CURLOPT_HTTPHEADER => array(
            'Accept: application/json',
            'Content-Type: application/x-www-form-urlencoded'
        ),
        ));
        
        $response = curl_exec($curl);
        $array=explode('&',$response);
        $new= $array[2];
        $session_id=substr($new, strpos($new, "=") + 1);
        
        curl_close($curl);
        
            return view('front.payment',compact('session_id'));
    }
}
