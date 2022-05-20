<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Languge
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
        $lang_suffix = app()->isLocale('en') ? '' : '_'.app()->getLocale();
        App::instance('db_lang_suffix', $lang_suffix);
        return $next($request);
    }
}
