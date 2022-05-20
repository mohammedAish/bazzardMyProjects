<?php

namespace App\Http\Controllers\Front;

use App\Models\Page;
use App\Models\Store;
use App\Models\Product;
use App\Models\Variant;
use App\Models\Category;
use App\Models\Customer;
use App\Models\PageDetaile;
use Illuminate\Http\Request;
use App\Models\Variant_Option;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EcommerceController extends Controller
{
    public function index(){
        $store = App::make('store.current');
        $categories=Category::where('store_id',$store->id)->where('status','active')->get();
        $products = Product::where('store_id',$store->id)->latest()->take(3)->get();
        $products_best_seles = Product::where('store_id',$store->id)->where('num_off_sales','>=',5)->latest()->take(3)->get();


        return view('front.'. $store->theme.'.home',compact('categories','products','products_best_seles'));
    }
    public function products($name){
        $store = App::make('store.current');
        $categories=Category::where('name',$name)->where('status','active')->first();
        $products = Product::where('category_id',$categories->id)->where('store_id',$store->id)->get();

        return view('front.'. $store->theme.'.products',compact('products'));
    }
    public function allproducts(){
        $store = App::make('store.current');
        $products = Product::where('store_id',$store->id)->get();

        return view('front.'. $store->theme.'.allproducts',compact('products'));
    }

    public function  products_detail ($name){
        $store = App::make('store.current');
        $product = Product::with('images')->where('name',$name)->first();
        $variants =Variant::where('product_id',$product->id)->get();
        $size = Variant_Option::whereRaw('variants_id in (select id from variants where product_id = ?)', [$product->id])
                ->where('option','size')->distinct()
                ->get('value');

                $size_count=count($size);
        return view('front.'.$store->theme.'.product_details',compact('product','size','size_count'));
    }

    public function products_detail_color(Request $request ,$id, $value)
    {
        $size = Variant_Option::join('variant__options as o2','o2.variants_id', '=', 'variant__options.variants_id')
        ->whereRaw('variant__options.variants_id in (select id from variants where product_id = ?)', [$id])
        ->where('variant__options.option','size')
        ->where('variant__options.value', $value)
        ->where('o2.option','color')
        ->distinct()
        ->get('o2.value')->toArray();
        return response()->json( $size);

}

public function themeindex()
{
    $user=Auth::user();
    $store=Store::where('user_id',$user->id)->first();
    return view('admin.store_style.index',compact('store'));
}

public function themestore(Request $request)
{
    $request->validate([
        'main_color' => 'required',
        'hover_color' => 'required',
        'font_color'=>'required',
    ]);
    $user=Auth::user();
    $store=Store::where('user_id',$user->id)->first();
        $data=$request->all();
        $settings = $store->setting;
        if (!is_array($settings)) {
            $settings = [];
        }

        $settings[$data['theme']] = [
            'main_color'=>$data['main_color'],
            'hover_color'=>$data['hover_color'],
            'font_color'=>$data['font_color']
        ];
        $store->setting = $settings;
        $store->theme = $request->theme;
        $store->save();
        return redirect()->back()->with('success',__('home.added_successfully'));
    }

    public function pages($page_name){
        $store = App::make('store.current');
        $pages=Page::where('key_page',$page_name)->first();
        $page = PageDetaile::where('page_id',$pages->id)->where('store_id',$store->id)->where('status','active')->first();
        return view('front.'. $store->theme. '.'.$page_name,compact('page'));
    }

    public function CheckoutFetchData(Request $request,$phone){
        $customer=Customer::where('phone','=',$phone)->first();
        return response()->json($customer);
    
    }
}
