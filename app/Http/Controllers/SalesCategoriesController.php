<?php

namespace App\Http\Controllers;

use App\Models\SalesCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesCategoriesController extends Controller
{
    public function __construct() 
    {
      $this->middleware('auth');
    }

    public function index()
    {
        //if(Auth::user()->hasAbility('sales_categories.view')){
        $sales_categories=SalesCategories::all();
        return view('admin.sales_categories.index',compact('sales_categories'));
   // }
       // else   
            //return view('layouts.denied_page');
    }
    public function create()
    {
        if(Auth::user()->hasAbility('sales_categories.create')){
        return view ('admin.sales_categories.create');
    }
         else   
            return view('layouts.denied_page');
    }
    public function store(Request $request)
    {
        if($request->hasFile('img'))
       {
           $file=$request->file('img');
           $new_img_name = Auth::user()->id.'_'.time().'.'.$request->img->extension();
           $file->move(public_path('img'), $new_img_name);
           $img= $new_img_name;
       }
      
        $sales_categories = SalesCategories::create([
            'title' => $request->title,
            'img' => $img,
        ]);
        return redirect()->route('sales_categories.index')->with('success',__('home.added_successfully'));
    }
    public function edit($id)
    {
         if(Auth::user()->hasAbility('sales_categories.update')){
        $sales_categories=SalesCategories::findOrFail($id);
        return view ('admin.sales_categories.edit',compact('sales_categories'));}
         else   
            return view('layouts.denied_page');
    }
    public function update(Request $request,$id)
    {
        //$this->validateCurrently($request);
        $sales_categories=SalesCategories::findOrFail($id);
        if($request->hasFile('img'))
       {
           $file=$request->file('img');
           $new_img_name = Auth::user()->id.'_'.time().'.'.$request->img->extension();
           $file->move(public_path('img'), $new_img_name);
           $img= $new_img_name;
       }
       else
       {
           $img=$sales_categories->img;
       }
        $sales_categories->whereId($id)->update([
            'title' => $request->title,
            'img' => $img,
        ]);
        return redirect()->route('sales_categories.index')->with('success' ,__('home.updated_successfully'));
    }
    public function destroy($id)
    {
        if(Auth::user()->hasAbility('sales_categories.delete')){
        $sales_categories=SalesCategories::findOrFail($id);
        $sales_categories->delete();
        return redirect()->route('sales_categories.index')->with('success' ,__('home.deleted_successfully'));
    }
         else   
            return view('layouts.denied_page');
    }
}
