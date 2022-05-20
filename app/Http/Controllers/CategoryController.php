<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatogeryRequest;
use App\Models\Category;
use App\Models\Store ;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->hasAbility('categories.view')){
        $categories=Category::where('store_id',Auth::user()->store_id)->get();
        return view('admin.categories.index',compact('categories'));
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
        if(Auth::user()->hasAbility('categories.create')){
        $parents = Category::where('store_id',Auth::user()->store_id)->orderBy('name', 'asc')->get();
        $category = new Category();
        return view('admin.categories.create',compact('parents','category'));
    }else
        return view('layouts.denied_page');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CatogeryRequest $request)
    {
        $data=$request->all();
        //$store = App::make('store.current');
        $user=Auth::user();
        $store=Store::where('user_id',$user->id)->first();
        //$data['slug']=Str::slug($data['name']);
        $data['store_id']=Auth::user()->store_id;
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $new_avatar_name = uniqid().'.'. $request->image->extension();
            $file->move(public_path('img'), $new_avatar_name);
            $image= $new_avatar_name;
            $data['image']=$image;
        }
        $category =Category::create($data);

        return redirect()->route('categories.index')->with('success',__('home.added_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category,$id)
    {
        if(Auth::user()->hasAbility('categories.create')){
        $category = Category::findOrFail($id);
        $parents = Category::where('store_id',Auth::user()->store_id)
        ->orderBy('name', 'asc')
        ->get();

        return view('admin.categories.edit',compact('category','parents'));
    }else
    return view('layouts.denied_page');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CatogeryRequest $request, Category $category,$id)
    {
        $category = Category::findOrFail($id);
        if ($category == null) {
            abort(404);
        }

        $data=$request->all();
        //$data['slug']=Str::slug($data['name']);
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $new_avatar_name = uniqid().'.'. $request->image->extension();
            $file->move(public_path('img'), $new_avatar_name);
            $image= $new_avatar_name;
            $data['image']=$image;
        }
        $category->update($data);

        return redirect()->route('categories.index')->with('success',__('home.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category,$id)
    {
        if(Auth::user()->hasAbility('categories.delete')){
        Category::destroy($id);
        /*$category = Category::findOrFail($id);
        $category->delete();*/
        return redirect()->route('categories.index')->with('success',__('home.deleted_successfully'));
    }else
    return view('layouts.denied_page');

    }
    public function status($id){

        $category=Category::findOrFail($id);
        if($category->status == 'active'){
          $staus ='inactive';
        }else
        $staus ='active';
        $category = Category::whereId($id)->update([
         'status' =>$staus,
     ]);
 return redirect()->route('categories.index')->with('success' ,__('home.status_updated_successfully'));;

    }
}
