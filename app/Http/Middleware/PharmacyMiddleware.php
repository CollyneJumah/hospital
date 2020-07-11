<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class PharmacyMiddleware
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
        if(Auth::check() && Auth::user()->isRole == 'pharmasist')
        {
            // return redirect()->route('pharmacist.index');
            return $next($request);
        }
        
    }
}
