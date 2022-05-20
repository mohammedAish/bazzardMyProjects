<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\UsersRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\Store;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        if(Auth::user()->type=='merchants'){
            $users_merchant=User::with('store')->where('store_id',Auth::user()->store->id)->where('type','users')->get();
            return view('admin.users.index',compact('users_merchant'));
        }
        else
        {
            $users=User::with('store')->where('type','users')->get();
        }
        return view('admin.users.index',compact('users'));
    }

    public function create(){
        $stores=Store::all();
        $merchantsstore=Store::where('user_id',Auth::user()->id)->get();
        return view('admin.users.create',compact('stores','merchantsstore'));
    }

    public function store(UsersRequest $request){
        $store=Store::where('id',$request->store_id)->first();
        $user = User::create([
            'user_name' => $request->user_name,
            'store_id' => $request->store_id,
            'mearchant_id' => $store->user_id,
            'email' => $request->email,
            'type' => 'users',
            'status'=>$request->status,
            'password' => Hash::make($request->password),
        ]);
    $roles = Role::where('name','users')->first();
    $roleuser = RoleUser::create([
        'role_id' => $roles->id,
        'user_id' => $user->id,
    ]);
    return redirect()->route('users.index')->with('success',__('home.added_successfully'));
    }

    public function show($id){
        $user=User::findOrFail($id);
    }

    public function edit($id){
        $user=User::findOrFail($id);
        return view('admin.users.edit',compact('user'));
    }

    public function update(UsersRequest $request,$id){
        $user=User::findOrFail($id);
       $user = User::whereId($id)->update([
        'user_name' => $request->user_name,
        'email' => $request->email,
        'status'=> $request->status,
        'password' => Hash::make($request->password),
    ]);

return redirect()->route('users.index')->with('success' ,__('home.updated_successfully'));
    }
    public function destroy($id){
        $user=User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', __('home.deleted_successfully'));
    }

    public function profile(){
        $id=Auth::user()->id;
        $user=User::findOrFail($id);
        return view('admin.users.profile',compact('user'));
    }


    public function profilestore(ProfileRequest $request,$id){
           $user=User::findOrFail($id);
       if($request->hasFile('avatar'))
       {
           $file=$request->file('avatar');
           $new_avatar_name = Auth::user()->id.'.' . $request->avatar->extension();
           $file->move(public_path('img'), $new_avatar_name);
           $avatar= $new_avatar_name;
       }else{
            $avatar= $user->avatar;
       }
       User::updateOrCreate(['id' => $id,
        ],[
            'user_name'=>$request->user_name,
            'full_name'=>$request->full_name,
            'avatar'=>$avatar,
            'email'=>$request->email,
            'birthday'=>$request->birthday,
            'country'=>$request->country,
            'address'=>$request->address,
            'phone_number'=>$request->phone_number,
        ]);
        return redirect()->route('profile.edite')->with('success' ,__('home.updated_successfully'));
    }

    public function password(){
        $id=Auth::user()->id;
        $user=User::findOrFail($id);
        return view('admin.users.changepassword',compact('user'));
    }
    public function changepassword(Request $request,$id){
        //dd($request->all());
        $user=Auth::user();
         $request->validate([
            'old_password' => 'required',
            'password' => 'min:8',
            'password_confirmation' => 'required_with:password|same:password|min:6'
        ]);

        if (Hash::check($request->old_password, $user->password)){
             User::whereId($id)->update([
                'password' => Hash::make($request->password),
             ]);

             return back()->with('success', __('home.updated_successfully'));
             }
             else{
                return back()->with('error', 'Password does not match');
             }
    }


        public function roles($id)
    {
        $users = User::findOrFail($id);
         $roleuser =RoleUser::where('user_id',$users->id)->first();
         $role = Role::where('id',$roleuser->role_id)->first();
        return view('admin.users.roleuser',compact('users','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function rolesstore(Request $request,$id)
    {
    $users = User::findOrFail($id);
    $role=User::whereId($id)->update([

        'abilities' => $request->abilities,
    ]);

        return redirect()->route('users.index')->with('success' ,__('home.updated_successfully'));
    }


}
