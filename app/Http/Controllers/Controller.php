<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

/*     public function place_order_new(Request $request)
	{
    	 $request->validate([
            'shipping_method' => 'required',
            'payment_method' => 'required',
            'payment_method' => 'required',
            'address_id' => 'required',
            'walletUsed' => 'required',
        ]);
        
	    $address_id =	$request->address_id;
		
    	$header= $request->header('Authorization');

    	 if($header == ""){
	        return response()->json(['result' => false, 'status_code' => 422, 'message' => 'Invalid Token'], 422);
	    }
	    
	    $token = str_replace("Bearer", "", $header);
        $token_user = DB::table('oauth_access_tokens')->where('token', trim($token))->first();
        $user_id =  $token_user->user_id;
	
	    $getLastrefId = RequestOrder::latest()->first();
	    $r = $getLastrefId->referanceid;
    
    $r = str_replace(array('ORD'), '', $r);
    $r = $r + 1;
    $zerosInRef = 'ORD';
    for ($i = 0; $i < 6 - strlen(strval($r)); $i++) {
        $zerosInRef = $zerosInRef . '0';
    }
    
    $ref = $zerosInRef . strval($r); // ReferanceId
    
     $cart = ApiCart::where('user_id',$user_id)->get();
     
     if($cart->count() == 0){
          return response()->json(['result' => false, 'status_code' => 422, 'message' => 'cart empty'], 422);
         
     }
     //return $cart;
     $total =  $cart->sum(function ($item) {
           
          return   $item->quantity * $item->price;//$item->product->product_price;
        });
        
        if($request->isDokanFlower=='true')
        {
             $subTotal = $request->shipping_method === 'one_day_delivery' ? $total + 20 : $total;
             $shippingCharges = $request->shipping_method === 'one_day_delivery' ? 20 : 0;
             $order_status = $request->payment_method === 'online' ? 'Under Observation' : 'pending';
        }else{
             $subTotal = $request->shipping_method === 'one_day_delivery' ? $total + 10 : $total;
             $shippingCharges = $request->shipping_method === 'one_day_delivery' ? 10 : 0;
             $order_status = $request->payment_method === 'online' ? 'Under Observation' : 'pending';
        }
             
     
        $amount=0;
        $new_amount=0;
    if ($request->walletUsed == 'yes') {
        
        $wallet = Wallet::where('user_id',$user_id)->first();
        $amount = $wallet->amount;
        $new_amount = '';
        if ($total < $amount) {
          
            $new_amount = $amount - $subTotal;
            $total = 0;
            
        } else {
            $total = $subTotal - $amount;
             $new_amount = 0;
        }
        
        //update wallt
            $wallet->amount = $new_amount;
            $wallet->save();
    }
    
     if($request->promo_code_id){
            $promo=ApiPromo::where('id',$request->promo_code_id)->first();
            $total=$total-$promo->discount;
            $subTotal=$subTotal-$promo->discount;
        }

    // store order 
    $placeOrder = new RequestOrder();
    $placeOrder->user_id = $user_id;
    $placeOrder->referanceid = $ref;
    $placeOrder->address_id =  $address_id;
    $placeOrder->sub_total = $total ;
    $placeOrder->shipping_charges = $shippingCharges;
    $placeOrder->total_price = $subTotal;
    $placeOrder->shipping_method = $request->shipping_method;
    $placeOrder->payment_status = $request->payment_method;
    $placeOrder->order_status = $order_status;
    $placeOrder->amount = $amount;
    $placeOrder->new_amount = $new_amount;
    $placeOrder->save();
    

    $useraddress = useraddress::where('id', $address_id)->where('user_id',$user_id)->first();
    
    
    $order_address = new OrderAddress();
    $order_address->user_id = $user_id;
    $order_address->order_id = $ref;
    $order_address->first_name = $useraddress->first_name;
    $order_address->last_name =  $useraddress->last_name;
    $order_address->mobile =  $useraddress->mobile;
    $order_address->email =  $useraddress->email;
    $order_address->zone = $useraddress->zone;
    $order_address->house = $useraddress->house;
    $order_address->street =  $useraddress->street;
    $order_address->country = $useraddress->country;
    $order_address->save();
   //return $cart;
   
   
    foreach($cart as $item){
   
        $main_price = $item->price;
     
       if($item->attribute_id){
          $att = manage_attribute_qty::where('id',$item->attribute_id)->first();
          $main_price = $att->product_attr_price;
          
       }
         $attribute_id = $item->attribute_id;
       $order_item =  $placeOrder->orderItems()->create([
          
        'seller_id' => $item->product->created_by,
        'order_id' =>  $placeOrder->id,
        'pro_id' => $item->product_id,
        'request_product_name' => $item->product_name,
        'actual_price' => $item->product->product_offer_price ?? $main_price,
        'request_product_price' => $item->product->product_offer_price ?? $main_price,
        'request_product_qty' => $item->quantity,
        'request_product_size' => $item->attributes,
        'request_attribute_id' => $attribute_id,
        'cat_type'=>'c',
        'cat_id'=>$item->cat_id
           
           ]);
           
         $item->product->decrement('product_qty',$item->quantity);    
         
          $CountAtts = manage_attribute_qty::where('product_id',$item->product_id)->whereHas('child_attributes',function($q) use ($attribute_id){
                 $q->where('manage_attr_id',$attribute_id);
            })->first();
            if($CountAtts){
          $CountAtts->decrement('product_attr_qty',$item->quantity);
            }
         $vendors[] = $item->product->created_by;
    }
    
    $seller_ids = implode(',', $vendors);
    $placeOrder->req_seller_id = $seller_ids;
    $placeOrder->update();
    
    
    	$data = [
    	    'referanceid' => $ref,
					];
					return response()->json(['data' => $data, 'result' => true, 'status_code' => 200, 'message' => 'Order Placed Successfully.'], 200);

    
	} */
}

