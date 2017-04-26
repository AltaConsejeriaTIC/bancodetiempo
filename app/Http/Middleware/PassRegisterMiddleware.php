<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PassRegisterMiddleware
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
            $pass1 = Auth::user()->privacy_policy == 1 ? 1 : 0;
            $pass2 = Auth::user()->interests->count() >= 1 ? 1 : 0;
            $pass3 = Auth::user()->services->count() >= 1 ? 1 : 0;
            $request->session()->put('pass1', $pass1);
            $request->session()->put('pass2', $pass2);
            $request->session()->put('pass3', $pass3);
            if($pass1 == 0){
                if($request->path() == 'register'){
                    return $next($request);
                }else{
                    return redirect('register');
                }
            }
            if($pass2 == 0){
                if($request->path() == 'interest'){
                    return $next($request);
                }elseif($request->path() == 'register'){
                    return $next($request);
                }else{
                    return redirect('interest');
                }
            }
            return $next($request);
        }

        return $next($request);
    }
}
