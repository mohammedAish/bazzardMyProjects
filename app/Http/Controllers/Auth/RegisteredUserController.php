<?php

namespace App\Http\Controllers\Auth;
use App\Models\Page;
use App\Models\PageDetaile;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\CurrentlySell;
use App\Models\Store;
use App\Models\User;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\SalesCategories;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $currently=CurrentlySell::all();
        $salescategories=SalesCategories::all();
        
        return view('front.register',compact('currently','salescategories'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
$role = Role::where('name','merchants')->first();
        $store = Store::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'how_sell_products'=>$request->how_sell_products,
            'what_going_sell'=>$request->what_going_sell,
            'business_registered'=>$request->business_registered,
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
            'phone_number' => $request->phone_number,
            'store_id' => $store->id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
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
        event(new Registered($user));

        Auth::login($user);
       //$user =User::where('email',$request->email)->first();
        // $user=Auth::user();
        // $user_id = encrypt($user->id);
        $slug = $store->slug;
        return redirect()->route('dashboard_store',[$slug]);


       // return redirect(RouteServiceProvider::HOME);
    }
}
