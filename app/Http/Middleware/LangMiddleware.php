<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Session;
use Config;
use Carbon\Carbon;

class LangMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Session::has('lang')){
            Session::put('lang',Config::get('app.locale'));
        }
        
        Carbon::setLocale(Session('lang'));
        App::setLocale(Session('lang'));        
        
        return $next($request);
    }
}
