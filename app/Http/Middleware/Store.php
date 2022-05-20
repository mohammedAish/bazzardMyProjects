<?php

namespace App\Http\Middleware;

use App\Models\Store as StoreModel;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

class Store
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $slug = $request->route('store');
        $store = StoreModel::where('slug', $slug)->firstOrFail();

        $settings = $store->setting;
        $theme=$store->theme;
        $settings = data_get($settings, $theme, []);
    
        App::instance('main_color', data_get($settings,'main_color','#FF0000'));
        App::instance('hover_color', data_get($settings,'hover_color','#000000'));
        App::instance('font_color', data_get($settings,'font_color','#000000'));


        App::instance('store.current', $store);

        URL::defaults([
            'store' => $slug,
        ]);

        Route::current()->forgetParameter('store');

        return $next($request);
    }
}
