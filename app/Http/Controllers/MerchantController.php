<?php

namespace App\Http\Controllers;

use App\Http\Requests\MerchantRequest;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\Store;
use App\Models\User;
use App\Models\PageDetaile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class MerchantController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index(){
        if(Auth::user()->hasAbility('users.view')){
           // ['id', '<>', 'Auth::user()->id'],
        $merchants=User::with('store')->where([
            ['type', '=', 'merchants'],
            
        ])->get();
        return view('admin.merchants.index',compact('merchants'));
         }
         else
            return view('layouts.denied_page');

    }
    public function create(){
         if(Auth::user()->hasAbility('users.create')){
        return view('admin.merchants.create',);
          }
         else
            return view('layouts.denied_page');
    }
    public function store(MerchantRequest $request)
    {

       $role = Role::where('name','merchants')->first();
        $store = Store::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'setting'=>['ecommerce' => [
                'main_color'=>'#f11616',
                'hover_color'=>'#ffffff',
                'font_color'=>'#ffffff'
            ],
            'ecommerce1' => [
                'main_color'=>'#ffffff',
                'hover_color'=>'#000000',
                'font_color'=>'#000000'
            ],
        ],

        ]);

        $user = User::create([
            'user_name' => $request->user_name,
            'store_id' => $store->id,
            'email' => $request->email,
            'type' => 'merchants',
            'password' => Hash::make($request->password),
            'status'=>$request->status,
        ]);
       Store::whereId($store->id)->update(['user_id' => $user->id,
    ]);

     $roleuser = RoleUser::create([
        'role_id' => $role->id,
        'user_id' => $user->id,
    ]);

    PageDetaile::create([
        'page_id' =>1,
        'store_id' => $store->id,
        'desc_ar' => "من نحن",
        'desc' => "about_us",
        'image' =>"",
        'status'=>"active",
    ]);
    PageDetaile::create([
        'page_id' =>2,
        'store_id' => $store->id,
        'desc_ar' => "اتصل بنا",
        'desc' => "contact_us",
        'image' =>"",
        'status'=>"active",
    ]);

    return redirect()->route('merchants.index')->with('success',__('home.added_successfully'));

    }

    public function show($id){
        $merchant=User::findOrFail($id);
        $this->authorize('view', $merchant);
    }

    public function edit($id){
         if(Auth::user()->hasAbility('users.update')){
        $merchant=User::findOrFail($id);
        $store=Store::where('user_id',$merchant->id)->first();
        return view('admin.merchants.edit',compact('merchant','store'));
         }
         else
            return view('layouts.denied_page');


    }
    public function update(MerchantRequest $request,$id){
        $merchant=User::findOrFail($id);
    User::whereId($id)->update([
        'user_name' => $request->user_name,
        'email' => $request->email,
        'status'=>$request->status,
        'password' => Hash::make($request->password),
    ]);

    Store::whereId($merchant->store_id)->update([
        'slug'=>$request->slug,
    ]);


return redirect()->route('merchants.index')->with('success' ,__('home.updated_successfully'));

    }
    public function destroy($id){
        if(Auth::user()->hasAbility('users.delete')){
        $merchant=User::findOrFail($id);

        $merchant->delete();
        return redirect()->route('merchants.index')->with('success' ,__('home.deleted_successfully'));
    }
        else
            return view('layouts.denied_page');

    }
    public function status($id){

        $merchant=User::findOrFail($id);
        if($merchant->status == 'active'){
          $staus ='inactive';
        }else
        $staus ='active';
        $merchant = User::whereId($id)->update([
         'status' =>$staus,
     ]);
 return redirect()->route('merchants.index')->with('success' ,__('home.status_updated_successfully'));;

    }
}
