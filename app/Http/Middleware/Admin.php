<?php

namespace App\Http\Middleware;

use Closure;
use Auth; 

class Admin
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
            return $next($request);
        } 
        if (Auth::user()->is_permission == '2') {
            
            return redirect()->route('user');
        }
    }
}
