<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Store;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
    public function index(){
        $stores = Store::all()->count();
        $orders=Order::with('customers')->latest()->take(20)->get();
        $orders_count=Order::all()->count();
        $deliver_orders=Order::whereStatus('completed')->count();
        $customers_count=Order::all()->count();
        $user_count=User::all()->count();
        return view('admin.dashboard',compact('stores','orders','orders_count','customers_count' ,'user_count','deliver_orders'));
    }
    public function mystores(){
      // $user=User::whereId(auth()->user()->id)->first()
       $stores = Store::whereId(auth()->user()->store_id)->first();
       $orders=Order::with('customers')->where('store_id',$stores->id)/* ->OrderBy('created_at','DESC') */->latest()->take(5)->get();
       $orders_count=Order::where('store_id',$stores->id)->get()->count();
       $deliver_orders=Order::where('store_id',$stores->id)->where('status','complete')->count();
       $totalRevenue=Order::where('store_id',$stores->id)->where('status','complete')->sum('total');
       $totalSales=Order::where('store_id',$stores->id)->where('status','complete')->where('created_at',Carbon::today())->count();
       $totalRevenue=Order::where('store_id',$stores->id)->where('status','complete')->where('created_at',Carbon::today())->sum('total');
       $customers_count=Order::where('store_id',$stores->id)->get()->count();
       $user_count=User::where('store_id',$stores->id)->where('type','user')->get()->count();
        return view('admin.dashboard_store',compact('stores','orders','orders_count','customers_count' ,'user_count','deliver_orders'));
    }

    public function reports(){
      $stores = Store::whereId(auth()->user()->store_id)->first();
      /*   $count_all =count($shortLinks); */
        $order_count=Order::where('store_id',$stores->id)->count();

      //  $orders_count=Order::where('store_id',$stores->id)->get()->count();
         $year = Carbon::now()->format('Y');
         $data = Order::where('store_id',$stores->id)->whereYear('created_at', '=', $year)
         ->selectRaw('count(*) as count, DATE_FORMAT(`created_at`, "%b") as month')
         ->groupBy(\DB::raw("DATE_FORMAT(`created_at`, '%b')"))->get();
         $data = $data->pluck('count','month')->toArray();
         $monthes = array_map(function($el) {
             return date('M', mktime(0,0,0,$el));
         }, range(1, 12));
         $result = array_replace(array_fill_keys($monthes, 0), $data);
        
        return view('admin.reports.index', compact('result','order_count') );
    }

}
