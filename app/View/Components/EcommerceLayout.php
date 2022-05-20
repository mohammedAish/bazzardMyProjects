<?php

namespace App\View\Components;

use App\Models\Cart;
use App\Models\Page;
use App\Models\User;
use App\Models\PageDetaile;
use Illuminate\View\Component;
use Illuminate\Support\Facades\App;

class EcommerceLayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $store = App::make('store.current');
        $user = User::where('store_id',$store->id)->where('type','merchants')->firstOrFail();
        $cart =Cart::where('cart_id',App::make('cart.id'))->get();
        $cart_count= $cart->count();

        $about_uss=Page::where('key_page','about_us')->first();
        if($about_uss->id != null){
        $about_us = PageDetaile::where('page_id',$about_uss->id)->where('store_id',$store->id)->first();
        }else{
        $about_us= "";
        }
        $contact_uss=Page::where('key_page','contact_us')->first();
        if($contact_uss->id != 'null'){
        $contact_us = PageDetaile::where('page_id',$contact_uss->id)->where('store_id',$store->id)->first();
        }
        else{
        $contact_us= "";
        }
        return view('components.ecommerce-layout',compact('cart_count','store','user','about_us','contact_us'));
    }
}
