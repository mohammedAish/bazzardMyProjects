<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Page;
use App\Models\PageDetaile;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PagesController extends Controller
{

    public function index(Request $request)
    {
        $user =Auth::user()->store_id;
        $store = Store::where('id',$user)->first();
        // $pages=PageDetaile::with('pages')->where('store_id',$store->id)->get();

       $pages=Page::leftJoin('page_detailes', function($join) use ($store) {
           $join->on('pages.id', 'page_detailes.page_id');
           $join->on('page_detailes.store_id', DB::raw($store->id));
       })
       ->select('pages.*', 'page_detailes.desc', 'page_detailes.id as page_detailes_id', 'page_detailes.desc_ar', 'page_detailes.image','page_detailes.status')
       ->get();
      
       $page_detailes= PageDetaile::first();
        return view('admin.static_page.index',compact('pages','page_detailes'));
    }
    public function update($key_page)
    {
        $page=Page::where('key_page',$key_page)->first();
        $user =Auth::user()->store_id;
        $store = Store::where('id',$user)->first();
        $page_detailes= PageDetaile::where('page_id',$page->id)->where('store_id',$store->id)->first();
       // dd($page_detailes);
        return view('admin.static_page.create',compact('page','page_detailes'));

    }
    public function store(Request $request, $key_page)
    {
        //dd($request->all());

        $user =Auth::user()->store_id;
        $store = Store::where('id',$user)->first();
        $page=Page::where('key_page',$key_page)->first();
        $page_detailes= PageDetaile::first();
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $new_avatar_name = uniqid().'.'. $request->image->extension();
            $file->move(public_path('img'), $new_avatar_name);
            $image= $new_avatar_name;
        }
        else{
            $image= $page_detailes->image;
            }

        $page_detailes = PageDetaile::updateOrCreate(['page_id' => $page->id,
        'store_id' => $store->id,
    ],[
            'page_id' => $page->id,
            'store_id' => $store->id,
            'desc_ar' => $request->desc_ar,
            'desc' => $request->desc,
            //'intro' => $request->intro,
            //'intro_ar' => $request->intro_ar,
            'image' => $image,
            'status'=>$request->status,
        ]);

        return redirect()->route('pages.index');
    }
    public function status($id){
        $page=PageDetaile::findOrFail($id);
        if($page->status == 'active'){
          $staus ='inactive';
        }else
        $staus ='active';
        $page = PageDetaile::whereId($id)->update([
         'status' =>$staus,
     ]);
 return redirect()->route('pages.index')->with('success' ,__('home.updated_successfully'));;

    }
}
