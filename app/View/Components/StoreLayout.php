<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;
use App\Models\Store;

class StoreLayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        // $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        //                 $uri_segments = explode('/', $uri_path);
        //        $id =$uri_segments[3];
                     

     $ids = Route::current()->originalParameters();

       $slug= $ids["slug"]  ;             
        // dd($id["id"]);
    $storeimg=Store::where('slug',$slug)->first();

      
        return view('components.store-layout',compact('storeimg'));
    }
}
