<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;

use Closure;

class UserServiceMiddleware
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
         if(Auth::user()->role_id == 1)
        {           
           return redirect('/homeAdmin');          
        }           
        if(Auth::user()->role_id == 2)
        {              
           return $next($request);
        }
    }
}
