<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\URL;

class LoginController extends Controller{
    protected $providerData;
    public function login($provider){
        Session::put('last_url', str_replace("http://" . $_SERVER['HTTP_HOST'], "", URL::previous()));
        Session::put('action', 'login');
        $function = "redirect" . ucwords($provider);
        return NetworkAccountsController::$function();
    }
    public function register($provider){
        Session::put('last_url', str_replace("http://" . $_SERVER['HTTP_HOST'], "", URL::previous()));
        Session::put('action', 'register');
        $function = "redirect" . ucwords($provider);
        return NetworkAccountsController::$function();
    }
    public function validateLogout(){
        if (auth()->user()) {
            Session::flush();
            auth()->logout();
        }
        return redirect('/');
    }
    public function callback($provider){

        $function = "getProviderData" . ucwords($provider);
        $this->providerData = NetworkAccountsController::$function();
        if(Session('action') == 'login'){
            return $this->userLogin();
        }elseif(Session('action') == 'register'){
            return $this->userRegister();
        }
    }

    private function userLogin(){
        $user = $this->getUser();
        if($user){
            if($user->state_id == 3){
                return redirect("/home")->with('message', "El usuario con el que intento acceder a Cambalachea ha sido bloqueado.");
            }else{
                Session()->put('GAEvent', ['event' => 'login', 'provider' => $this->providerData['provider']]);
                Auth()->login($user);
                return redirect(Session::get('last_url'));
            }
        }else{
            return redirect("/")->with('message', "Primero debes registrarte");
        }
    }

    private function getUSer(){
        $user = User::where('email', $this->providerData['email'])->get()->last();
        if(is_null($user)){
            return false;
        }
        return $user;
    }

    private function userRegister(){
        $usersClass = new UsersController();
        $user = $usersClass->createUser($this->providerData);
        Auth()->login($user);
        AttainmentsController::saveAttainment(1);
        return redirect("/home");
    }
}
