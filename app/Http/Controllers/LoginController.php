<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Models\NetworkAccounts;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\URL;
use App\Models\LastSession;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{
    protected $providerData;

    public function loginWithPass(Request $request){
        Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        return redirect('/');

    }

    public function login($provider){
        Session::put('last_url', str_replace("http://" . $_SERVER['HTTP_HOST'], "", URL::previous()));
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
        if($this->getUser()){
            return $this->userLogin();
        }else{
            return $this->userRegister();
        }
    }
    private function userLogin(){
        $user = $this->getUser();
        if($user->state_id == 3){
            return redirect("/")->with('blockedUser', true);
        }else{
            Session()->put('GAEvent', ['event' => 'login', 'provider' => $this->providerData['provider']]);
            Auth()->login($user);
            LastSession::create(["user_id" => Auth::id()]);
            return redirect(Session::get('last_url'));
        }
    }
    private function getUSer(){
        $email = is_null($this->providerData['email']) ? $this->providerData['id'] . "@cambalachea.co" : $this->providerData['email'];
        $user = User::where('email', $email)->get()->last();
        if(is_null($user)){
            return false;
        }
        return $user;
    }
    private function userRegister(){
        $usersClass = new UsersController();
        if($usersClass->validateEmailUnique($this->providerData['email'])){
            $user = $usersClass->createUser($this->providerData);
            Auth()->login($user);
            if(!is_null($this->providerData['email'])){
                AttainmentsController::saveAttainment(1);
            }
            return redirect("/home");
        }else{
            $idUser = User::where('email2', $this->providerData['email'])->get()->last()->id;
            $account = NetworkAccounts::where('user_id', $idUser)->get();
            
            $provider = '';
            if(!is_null($account) && $account->count() > 0){
                $provider = $account->last()->provider;
            }
            return redirect(Session::get('last_url'))->with('errorLogin', 'Su email ya se encuentra registrado con '.$provider.' en otra cuenta');
        }
    }
}
