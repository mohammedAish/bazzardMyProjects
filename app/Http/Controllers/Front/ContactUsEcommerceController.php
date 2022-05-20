<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\ContactUsEcommerce;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ContactUsEcommerceController extends Controller
{
    public function index()
    {
        $contact=ContactUsEcommerce::all();
        return view('admin.contactus_merchant.index',compact('contact'));
    }

    public function show($id){
        $contact=ContactUsEcommerce::findOrFail($id);
        return view('admin.contactus_merchant.show',compact('contact'));
    }

    public function store(Request $request)
    {
        /* $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'subject'=>'required',
            'msg' => 'required|min:3|max:255',
        ]); */
        $contactus = ContactUsEcommerce::create([
            'name' => $request->name,
            'email' => $request->email,
            'Subject'=>$request->Subject,
            'msg'=>$request->message,
        ]);
     return redirect()->back()->with('success',__('home.added_successfully'));
     }
     public function destroy($id){
        if(Auth::user()->hasAbility('users.delete')){
       $contact=ContactUsEcommerce::findOrFail($id);
       $contact->delete();
       return redirect()->back()->with('success', __('home.deleted_successfully'));
        }
        else
           return view('layouts.denied_page');
   }
}
