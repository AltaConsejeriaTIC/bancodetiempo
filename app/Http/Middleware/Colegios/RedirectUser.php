<?php

namespace App\Http\Middleware\Colegios;
use Illuminate\Support\Facades\Auth;
use Closure;

class RedirectUser
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
        
        if(Auth::check()){
        
            if(Auth::User()->role_id == 1){
                return redirect("/panel");
            }else{
                return redirect("/panel-estudiante");
            }
            
        }else{
            return redirect("/");
        }
        
    }
}
