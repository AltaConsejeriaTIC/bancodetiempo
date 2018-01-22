<?php

namespace App\Http\Middleware\Colegios;
use Illuminate\Support\Facades\Auth;
use Closure;

class LoginMiddleware
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
            return redirect("inicio");
        }
        return $next($request);
    }
}
