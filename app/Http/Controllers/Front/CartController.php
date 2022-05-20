<?php

namespace App\Http\Controllers\front;

use App\Models\Cart;
use App\Models\City;
use App\Models\Order;
use App\Models\Store;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Order_Product;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\Product;
use App\Rules\QuantityCartValidation;
use Illuminate\Contracts\Validation\Rule;

class CartController extends Controller
{

    public function index(Request $request)
    {
        $store = App::make('store.current');
        $cart = Cart::with('products')->where('cart_id', App::make('cart.id'))->get();

        $total = $cart->sum(function ($product) {
            if($product->products->seleprice == NULL){
            return $product->products->price * $product->quantity;
            }
            return $product->products->saleprice * $product->quantity;
        });
        return view('front.' . $store->theme . '.cart', compact('cart', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'quantity' => new QuantityCartValidation($request->product_id),
        ]);
        $store = App::make('store.current');
        $form_data  = Cart::where(
            [
                'product_id' => $request->product_id,
                'cart_id' => App::make('cart.id'),
            ]
        )->first();
        if ($form_data) {

            $form_data->increment('quantity', $request->quantity);
        } else {



            $form_data  = Cart::create(
                [
                    //'user_id' => Auth::user()->id,
                    'product_id' => $request->product_id,
                    'size' => $request->size,
                    'color' => $request->color,
                    'quantity' => $request->quantity,
                    'cart_id' => App::make('cart.id'),
                    'store_id'=>$store->id
                ]
            );
        }
        //Cart::create($form_data);
        return response()->json([
            'status' => true,
        ]);
    }

    public function checkOut()
    {
        $cities=City::all();
        $store = App::make('store.current');
        $customer=Customer::where('store_id',$store->id)->first();
        $cart = Cart::with('products')->where('cart_id', App::make('cart.id'))->get();
        $total = $cart->sum(function ($product) {
            if($product->products->saleprice == NULL)
            return $product->products->price * $product->quantity;
            else
            return $product->products->saleprice * $product->quantity;

        });

        return view('front.' . $store->theme . '.checkout', compact('cart', 'total','cities','customer'));
    }

    public function checkOut_store(CheckoutRequest $request)
    {
        $store = App::make('store.current');
        $cart = Cart::with('products')->where('cart_id', App::make('cart.id'))->get();
        $total = $cart->sum(function ($product) {
            return $product->products->price * $product->quantity;
        });
        $customer = Customer::updateOrCreate([
            'phone'   =>  $request->phone,
        ],[
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'country' => $request->city,
            'address' => $request->address,
            'phone' => $request->phone,
            'store_id'=>$store->id,
            'postal_code' => "NULL",
        ]);
        $order = Order::create([
            'customer_id' => $customer->id,
            'total' => $total,
            'store_id'=>$store->id,
        ]);
        foreach ($cart as $item) {

            if($item->products->saleprice == NULL){
            $total_price =   $item->products->price * $item->quantity;
            $price=$item->products->price;
            }else{
            $total_price =   $item->products->saleprice * $item->quantity;
            $price=$item->products->saleprice;
            }
            $order_product = Order_Product::create([
                'product_id' => $item->product_id,
                'order_id' => $order->id,
                'size' => $item->size,
                'color' => $item->color,
                'quantity' => $item->quantity,
                'price' => $price,
                'total_price' => $total_price,
            ]);
            $product_num=Product::whereId($item->product_id)->first();
            $product_num_off_sales = $product_num->num_off_sales + 1;
            $qtyy=$product_num->qty -$item->quantity;
            $product_update = Product::whereId($item->product_id)->update([
                'num_off_sales' => $product_num_off_sales,
                'qty' =>$qtyy,

            ]);
        }
        Cart::where('cart_id', App::make('cart.id'))->delete();
        return redirect()->route('home')->with('success',__('home.added_successfully'));;
    }

    public function destroy($id)
    {
        Cart::findOrFail($id)->delete();
        return redirect()->back()->with('success', __('home.deleted_successfully'));
    }
}
