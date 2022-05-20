<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Models\Order;
use App\Models\City;
use App\Models\Order_Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $customers=Customer::where('store_id',Auth::user()->store_id)->get();
        return view('admin.customers.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities=City::all();
        return view('admin.customers.create',compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $data=$request->all();
        $data['store_id']=Auth::user()->store_id;
        Customer::create($data);
        
        return redirect()->route('customers.index')->with('success',__('home.added_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer,$id)
    {
        $cities=City::all();
        $customer = Customer::findOrFail($id);
        return view('admin.customers.edit',compact('customer','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, Customer $customer,$id)
    {
        $customer = Customer::findOrFail($id);
        $data=$request->all();
        $customer->update($data);

        return redirect()->route('customers.index')->with('success',__('home.update_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer,$id)
    {
        $customer = Customer::findOrFail($id);
        $orders=Order::where('customer_id',$id)->get();
        foreach($orders as $order){
            $order_product=Order_Product::where('order_id',$order->id)->delete();
            $order->delete();
        }
        $customer->delete();
        return redirect()->route('customers.index')->with('success',__('home.deleted_successfully'));
    }
}
