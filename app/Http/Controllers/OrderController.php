<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Order_Product;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;
use App\Models\User;
use App\Models\Variant;
use App\Models\Variant_Option;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('customers')->where('store_id', Auth::user()->store_id)->where('user_id', '!=', null)->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function index1()
    {
        $orders = Order::where('store_id', Auth::user()->store_id)->where('user_id', '=', null)->get();
        return view('admin.orders.index1', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        $products = Product::where('store_id', Auth::user()->store_id)->where('status', 'active')->get();
        return view('admin.orders.create', compact('customers', 'products'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $product = Product::whereId($request->product_id)->first();
        $customer = Customer::whereId($request->customer_id)->first();

        $order = Order::create([
            'customer_id' => $customer->id,
            'total' => $product->price,
            'store_id' => $product->store_id,
            'status' => $request->status,
            'user_id' => Auth::user()->id,
        ]);
        $order_product = Order_Product::create([
            'product_id' => $product->id,
            'order_id' => $order->id,
            'size' => $request->size,
            'color' => $request->color,
            'quantity' => $request->quantity,
            'price' => $product->price,
            'total_price' => $product->price,
        ]);
        $product_num_off_sales = $product->num_off_sales + 1;
        $product_update = Product::whereId($product->id)->update([
            'num_off_sales' => $product_num_off_sales,
        ]);

        return redirect()->route('systemOrders.index')->with('success', __('home.added_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order,$id)
    {
        $order = Order::findOrFail($id);
        $customer=Customer::where('store_id', Auth::user()->store_id)->first();
        $order_products=Order_Product::where('order_id',$order->id)->get();
        foreach($order_products as $item){
        $product=Product::where('id',$item->product_id)->first();
        }
        return view('admin.orders.show', compact('order','order_products','product','customer'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order, $id)
    {
        $customers = Customer::all();
        $order = Order::findOrFail($id);
        $products = Product::where('store_id', Auth::user()->store_id)->where('status', 'active')->get();
        $order__products = Order_Product::where('order_id', '=', $order->id)->first();
        return view('admin.orders.edit', compact('order', 'customers', 'products', 'order__products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, Order $order, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());

        return redirect()->route('systemOrders.index')->with('success', __('home.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order, $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('systemOrders.index')->with('success', __('home.deleted_successfully'));
    }

    public function getproduct($id)
    {
        $variants = Variant::where('product_id', $id)->get();
        $data = Variant_Option::whereRaw('variants_id in (select id from variants where product_id = ?)', [$id])
            ->where('option', 'size')->distinct()
            ->get('value');

        if ($data) {
            return view('admin.orders.size')->with([
                'data' => $data,
                'id' => $id
            ]);
        }
    }
    public function products_ordere_color($id, $value)
    {
        $size = Variant_Option::join('variant__options as o2', 'o2.variants_id', '=', 'variant__options.variants_id')
            ->whereRaw('variant__options.variants_id in (select id from variants where product_id = ?)', [$id])
            ->where('variant__options.option', 'size')
            ->where('variant__options.value', $value)
            ->where('o2.option', 'color')
            ->distinct()
            ->get('o2.value')->toArray();
        return response()->json($size);
    }


    public function confirmedOrder(Request $request,$id)
        {
            $order = Order::find($id);
            $order->status = 'processing';
            $order->save();
            return redirect()->back()->with('success', __('home.updated_successfully'));
        }

        public function canceledOrder(Request $request,$id)
        {
            $order = Order::find($id);
            $order->status = 'canceled';
            $order->save();
            return redirect()->back()->with('success', __('home.updated_successfully'));
        }
        public function deliverOrder(Request $request,$id)
        {
            $order = Order::find($id);
            $customer=Customer::whereId($order->customer_id)->first();
            $user=User::where('store_id',$order->store_id)->where('type','merchants')->first();
            $order_products=Order_Product::where('order_id',$order->id)->get();
            $store=Store::where('user_id',$user->id)->first();
            
            $quantity=0;
            foreach($order_products as $item){

                $quantity+=$item->quantity;
            }
            $quantit=(int)$quantity;

            $response = Http::withHeaders([
                "Content-Type" => "application/json",
                "Accept" => "application/json",
                "company-id" => $store->company_id
            ])->post('https://apisv2.logestechs.com/api/ship/request/by-email', [
                "email"=>"firas.thawabi",
              "password"=>"firas123",
              "pkg"=> [
                        "cod"=> "600", //required التحصيل شامل التوصيل - cash on delivery - سعر المنتج
                        "notes"=> "Luxury ",
                        "senderFirstName"=> $user->user_name,
                        "senderLastName"=> $user->full_name, //required
                        "businessSenderName"=> "شركة لوجستكس",
                        "senderPhone"=>  $user->phone_number, //required
                        "receiverPhone"=> $customer->phone, //required
                        "receiverFirstName"=>$customer->first_name,
                        "serviceType"=> "STANDARD", //required
                        "shipmentType"=> "COD", //required
                        "quantity"=>$quantit //required
              ],
                    "destinationAddress"=> [
                        "addressLine1"=> $customer->address, //required
                        "cityId"=>$customer->country, //required
                        "regionId"=>  23, //required
                        "villageId"=>  23 //required
                    ],
                    "pkgUnitType"=> "METRIC",
                    "originAddress"=> [
                        "addressLine1"=>  $user->address, //required
                        "cityId"=> $user->country, //required
                        "regionId"=>  23, //required
                        "villageId"=>  23 //required
                    ]
            ]);
            // echo $response;
            json_decode($response);
            $order->status = 'in-delivery';
            $order->save();
               return redirect()->back()->with('success', __('home.updated_successfully'));
            // dd($quantity);
            // $curl = curl_init();

            // curl_setopt_array($curl, array(
            //   CURLOPT_URL => 'https://apisv2.logestechs.com/api/ship/request/by-email',
            //   CURLOPT_RETURNTRANSFER => true,
            //   CURLOPT_ENCODING => '',
            //   CURLOPT_MAXREDIRS => 10,
            //   CURLOPT_TIMEOUT => 0,
            //   CURLOPT_FOLLOWLOCATION => true,
            //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //   CURLOPT_CUSTOMREQUEST => 'POST',
            //   CURLOPT_POSTFIELDS =>'{
            //     "email": "firas.thawabi",
            //     "password":"firas123",
            //     "pkg": {
            //         "cod": "600", //required التحصيل شامل التوصيل - cash on delivery - سعر المنتج
            //         "notes": "Luxury ",
            //         "senderFirstName": "$user->user_name",
            //         "senderLastName": $user->full_name, //required
            //         "businessSenderName": "شركة لوجستكس",
            //         "senderPhone":  $user->phone_number, //required
            //         "receiverPhone": $customer->phone, //required
            //         "receiverFirstName":$customer->first_name,
            //         "serviceType": "STANDARD", //required
            //         "shipmentType": "COD", //required
            //         "quantity":1 //required
            //     },
            //     "destinationAddress": {
            //         "addressLine1": $user->address, //required
            //         "cityId": 1, //required
            //         "regionId":  23, //required
            //         "villageId":  23 //required
            //     },
            //     "pkgUnitType": "METRIC",
            //     "originAddress": {
            //         "addressLine1":  $user->address, //required
            //         "cityId": 1, //required
            //         "regionId":  23, //required
            //         "villageId":  23 //required
            //     }
            // }
            // ',
            //   CURLOPT_HTTPHEADER => array(
            //     'company-id: 1',
            //     'Accept: application/json',
            //     'Content-Type: application/json'
            //   ),
            // ));

            // $response = curl_exec($curl);

            // curl_close($curl);
            // echo $response;
            // $order->status = 'in-delivery';
            // $order->save();

           // return redirect()->back()->with('success', __('home.update_status'));
        }

}


