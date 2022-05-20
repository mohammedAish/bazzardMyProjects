<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Store;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        return view('front.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {

       // dd($users->status);
        if (User::where('email',  $request->email)->exists()){
        $user =User::where('email',$request->email)->with('store')->first();
        if($user->status =="inactive"){
        return redirect()->route('login')->with('disable' ,__('auth.disable'));

                }
                    }
        $request->authenticate();

        $request->session()->regenerate();
        if($user->type == "merchants"){
            return redirect()->route('dashboard_store');

        }elseif($user->type == "users"){
            return redirect()->route('dashboard_store');
        }
        return redirect()->intended(RouteServiceProvider::HOME);


}

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

