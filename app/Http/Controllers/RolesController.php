<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
     if(Auth::user()->hasAbility('roles.view')){
        $roles=Role::paginate();
        return view('admin.roles.index',compact('roles'));
           }
         else
            return view('layouts.denied_page');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
 if(Auth::user()->hasAbility('roles.create')){
        return view('admin.roles.create',['role'=> new Role()]);
           }
         else
            return view('layouts.denied_page');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {

        $role=Role::create($request->all());
        return redirect()->route('roles.index')->with('success',__('home.added_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         if(Auth::user()->hasAbility('roles.update')){
        $role=Role::findOrFail($id);
        return view('admin.roles.edit',compact('role'));
           }
         else
            return view('layouts.denied_page');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        $role=Role::findOrFail($id);
        $role->update($request->all());
        return redirect()->route('roles.index')->with('success' ,__('home.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          if(Auth::user()->hasAbility('roles.delete')){
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('roles.index')
            ->with('success', __('home.deleted_successfully'));
             }
         else
            return view('layouts.denied_page');
    }
}
