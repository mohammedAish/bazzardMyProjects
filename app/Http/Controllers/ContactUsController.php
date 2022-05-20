<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactUsController extends Controller
{
    public function index(){
        $contact=ContactUs::all();
        return view('admin.contactus.index',compact('contact'));
}

public function show($id){
    $contact=ContactUs::findOrFail($id);
    return view('admin.contactus.show',compact('contact'));
}

public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'message' => 'required|min:3|max:255',
        ]);
        $contactus = ContactUs::create([
            'name' => $request->name,
            'email' => $request->email,
            'message'=>$request->message,
        ]);
        return response()->json(
            [
                'success' => true,
                'message' => 'Your message was sent successfully'
            ]);
     //return redirect()->back()->with('success',__('home.added_successfully'));
     }
     public function destroy($id){
        if(Auth::user()->hasAbility('users.delete')){
       $contact=ContactUs::findOrFail($id);
       //$this->authorize('delete', $admin);
       $contact->delete();
       return redirect()->back()->with('success', __('home.deleted_successfully'));
        }
        else
           return view('layouts.denied_page');
   }
}
