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

    protected $pass1;
    protected $pass2;
    protected $pass3;

    public function handle($request, Closure $next)
    {
        $this->pass1 = Auth::user()->privacy_policy == 1 ? 1 : 0;
        $this->pass2 = Auth::user()->interests->count() >= 1 ? 1 : 0;
        $this->pass3 = Auth::user()->services->count() >= 1 ? 1 : 0;
        $request->session()->put('pass1', $this->pass1);
        $request->session()->put('pass2', $this->pass2);
        $request->session()->put('pass3', $this->pass3);

        if($this->pass1 == 0 || $this->pass2 == 0){
            $send = $this->send($request);

            if($send === true){
                return $next($request);
            }else{

                return $send;
            }
        }
        return $next($request);

    }

    private function send($request){

        $function = "pass_".$request->path();

        if($request->path() == 'service'){
            return true;
        }

        if($request->path() != 'register' && $request->path() != 'interest'){
            return redirect('register');
        }
        $response = $this->$function();

        return $response;
    }

    public function pass_register(){

        if($this->pass1 == 1){
            return redirect('interest');
        }else{
            return true;
        }

    }
    public function pass_interest(){

        if($this->pass2 == 1){
            return redirect('service');
        }else{
            return true;
        }

    }
}
