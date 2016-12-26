<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;

class RedirectIfNotService
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
        if(Auth::user()->id && Service::whereUserId(Auth::user()->id)->first() && Auth::user()->role_id == 2)
        {                  
    	   return $next($request);    		
    	}    	
       
    	return redirect('/service');
       

    }
}
