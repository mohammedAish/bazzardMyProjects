<?php

namespace App\View\Components;
use App\Models\Store;
use App\Models\User;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
class AdminLayout extends Component
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
        if((Auth::user()->type  == "superadmin") || (Auth::user()->type  == "admins")){
        $store=Store::query()->first();
        $user=User::query()->first();
            return view('components.admin-layout',compact('store','user'));
        }
        else{
        $store=Store::where('id',auth()->user()->store_id)->first();
        $user=User::where('id',auth()->user()->id)->first();
        return view('components.admin-layout',compact('store','user'));
    }
    }
}
