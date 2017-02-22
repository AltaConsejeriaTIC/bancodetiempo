<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Models\InterestUser;
class IncompleteRegisterMiddleware
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
            if (Auth::user()->privacy_policy == 1) {
                if(InterestUser::whereUserId(Auth::user()->id)->count()>=3) {
                    if (Service::whereUserId(Auth::user()->id)->first()) {
                        
                        return $next($request);
                    }
                    
                    return redirect('/service');
                }
                
                return redirect('/interest');
            }
            
            return redirect('/register');

        }

    }
}
