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
    	
    	if(Auth::user()->id && Service::whereUserId(Auth::user()->id)->first()){
    		
    		return $next($request);
    		
    	}
    	
    	return redirect('/service');
    }
}
