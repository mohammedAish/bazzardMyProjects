<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\CurrentlySell;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class MyStoresController extends Controller
{
    public function __construct() 
    {
      $this->middleware('auth');
    }
    public function index($slug){
        $sell=CurrentlySell::all();
        $store =Store::where('slug',$slug)->first();
        return view('admin.mystores',compact('store','sell'));
    }
    public function profile($slug)
    {
        $sell=CurrentlySell::all();

        $store =Store::where('slug',$slug)->first();
        return view('admin.store_profile',compact('store','sell'));
    }

     public function profilestore(Request $request,$slug){
        $store=Store::where('slug',$slug)->first();
        /*if ($store->logo!=null)
        $logo=$store->logo;
        else
        $logo='null';*/
       if($request->hasFile('logo'))
       {
           $file=$request->file('logo');
           $new_avatar_name = Auth::user()->id.'.' . $request->logo->extension();
           $file->move(public_path('img'), $new_avatar_name);
           $logo= $new_avatar_name;
           
       }
       else{
     
        $logo= $store->logo;
       }
      
       Store::updateOrCreate(['slug' => $slug,
        ],[
            'name'=>$request->name,
            'slug'=>$request->slug,
            'how_sell_products'=>$request->how_sell_products,
            'logo'=>$logo,
           
            'plan'=>$request->plan,
       
        ]);
        return redirect()->back();
    }

}
