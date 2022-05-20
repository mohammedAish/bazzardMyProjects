<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminsRequest;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
    }
    public function index(){
        if(Auth::user()->hasAbility('users.view')){
            //['id', '<>', Auth::user()->id],
        $admins=User::where([
            ['type', '=', 'admins'],
            ])->get();
        return view('admin.admins.index',compact('admins'));
        }
         else
            return view('layouts.denied_page');
    }
    public function create(){
         if(Auth::user()->hasAbility('users.create')){
        return view('admin.admins.create');
            }
         else
            return view('layouts.denied_page');
    }

    public function store(AdminsRequest $request)
    {
        $user = User::create([
            'user_name' => $request->user_name,
            'email' => $request->email,
            'type' => 'admins',
            'status'=>$request->status,
            'password' => Hash::make($request->password),
        ]);
        $roles= Role::where('name','admins')->first();
    $roleuser = RoleUser::create([
        'role_id' => $roles->id,
        'user_id' => $user->id,
    ]);
    return redirect()->route('admins.index')->with('success',__('home.added_successfully'));
    }

    public function show($id){
        $admin=User::findOrFail($id);
        //$this->authorize('view', $admin);
    }

    public function edit($id){
         if(Auth::user()->hasAbility('users.update')){
        $admin=User::findOrFail($id);
        //$this->authorize('update', $admin);
        return view('admin.admins.edit',compact('admin'));
         }
         else
            return view('layouts.denied_page');


    }
    public function update(AdminsRequest $request,$id){
        $admin=User::findOrFail($id);
       // $this->authorize('update', $admin);
       $user = User::whereId($id)->update([
        'user_name' => $request->user_name,
        'email' => $request->email,
        'status'=>$request->status,
        'password' => Hash::make($request->password),
    ]);

return redirect()->route('admins.index')->with('success' ,__('home.updated_successfully'));

    }
    public function destroy($id){
         if(Auth::user()->hasAbility('users.delete')){
        $admin=User::findOrFail($id);
        //$this->authorize('delete', $admin);
        $admin->delete();
        return redirect()->route('admins.index')->with('success', __('home.deleted_successfully'));
         }
         else
            return view('layouts.denied_page');
    }
      public function status($id){
        $admin=User::findOrFail($id);
        // $this->authorize('update', $admin);
        if($admin->status == 'active'){
          $status ='inactive';
        }else
        $status ='active';
        $admin = User::whereId($id)->update([
         'status' =>$status,
     ]);
 return redirect()->route('admins.index')->with('success' ,__('home.status_updated_successfully'));;

    }
}
