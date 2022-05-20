<?php

namespace App\Http\Controllers;

use App\Http\Requests\CurrentlySellRequest;
use App\Models\CurrentlySell;
use Illuminate\Support\Facades\Auth;

class CurrentlySellController extends Controller
{
    public function __construct() 
    {
      $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->hasAbility('currently_sells.view')){
        $currently=CurrentlySell::all();
        return view('admin.currently_sells.index',compact('currently'));}
        else   
            return view('layouts.denied_page');
    }
    public function create()
    {
        if(Auth::user()->hasAbility('currently_sells.create')){
        return view ('admin.currently_sells.create');}
         else   
            return view('layouts.denied_page');
    }
    public function store(CurrentlySellRequest $request)
    {
        if($request->hasFile('img'))
       {
           $file=$request->file('img');
           $new_img_name = Auth::user()->id.'_'.time().'.'.$request->img->extension();
           $file->move(public_path('img'), $new_img_name);
           $img= $new_img_name;
       }
      
       $currently = CurrentlySell::create([
            'title' => $request->title,
            'img' => $img,
        ]);
       
        return redirect()->route('currently_sells.index')->with('success',__('home.added_successfully'));
    }
    public function edit($id)
    {
         if(Auth::user()->hasAbility('currently_sells.update')){
        $currently=CurrentlySell::findOrFail($id);
        return view ('admin.currently_sells.edit',compact('currently'));}
         else   
            return view('layouts.denied_page');
    }
    public function update(CurrentlySellRequest $request,$id)
    {
        //$this->validateCurrently($request);
        $currently=CurrentlySell::findOrFail($id);
        if($request->hasFile('img'))
       {
           $file=$request->file('img');
           $new_img_name = Auth::user()->id.'_'.time().'.'.$request->img->extension();
           $file->move(public_path('img'), $new_img_name);
           $img= $new_img_name;
       }
       else
       {
           $img=$currently->img;
       }
        $currently->whereId($id)->update([
            'title' => $request->title,
            'img' => $img,
        ]);
        return redirect()->route('currently_sells.index')->with('success' ,__('home.updated_successfully'));
    }
    public function destroy($id)
    {
               if(Auth::user()->hasAbility('currently_sells.delete')){
        $currently=CurrentlySell::findOrFail($id);
        $currently->delete();
        return redirect()->route('currently_sells.index')->with('success', __('home.deleted_successfully'));
    }
         else   
            return view('layouts.denied_page');
    }
}
