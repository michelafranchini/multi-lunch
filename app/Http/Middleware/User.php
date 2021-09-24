<?php

namespace App\Http\Middleware;

use Closure;
use Auth; 

class User
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
        if (Auth::user()->is_permission == '1') {
            return redirect()->route('admin');
        } 
        if (Auth::user()->is_permission == '2') {
            
            return $next($request);
        }
    }
}
