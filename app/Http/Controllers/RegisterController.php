<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use JavaScript;
use Validator;

class RegisterController extends Controller
{
    public function finalizeRegister(){
        return view('auth/finalizeRegister');
    }

    public function registerWithPass(Request $request){

        $validation = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        if($validation->fails()){
            return redirect("/")->withErrors($validation);
        }

        $user = User::create([
            'first_name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'email2' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => 2,
            'state_id' => 4,
            'plataforma' => 1
        ]);

        Auth()->login($user);

        return redirect("/");

    }
}
