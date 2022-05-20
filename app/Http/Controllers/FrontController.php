<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\Store;

class FrontController extends Controller
{
    public function index(){
        return view('front.index');
    }
    public function price(){
        return view('front.price');
    }
    public function contact(){
        return view('front.contact');
    }
    public function policy(){
        return view('front.policy');
    }
    public function terms(){
        return view('front.terms');
    }

    public function validateRegistration(RegisterRequest $request){
        return response()->json();
    }

    public function RealTimeValidate(Request $request,$slug){
        $exists= Store::where('slug','=',$slug)->exists();
        return [
            'exists' =>$exists,
            'msg'    =>$exists ?'This domain Already Used':'Domain Available',
        ];
    }


}
