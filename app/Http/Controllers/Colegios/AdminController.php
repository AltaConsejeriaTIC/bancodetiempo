<?php

namespace App\Http\Controllers\Colegios;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Colegio;
use App\Models\ColegioUsuario;

class AdminController extends Controller
{
    public function registroForm(Request $request){
        return view("colegios/registroAdmin");
    }
    
    public function registro(Request $request){
        
        $validator = Validator::make($request->all(), [
            "colegio" => "required",
            "password" => "required",
            "email" => "required|email|unique:users,email",
            "name" => "required",
            "terminos" => "required"
        ]);
        
        $colegio = str_replace(" ", "-", strtolower($request->colegio));
        
        $validator->after(function ($validator) use ($colegio) {
            if ($this->validarColegio($colegio)) {
                $validator->errors()->add('Colegio', 'El colegio ingresado ya existe');
            }
        });
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $colegio = Colegio::create([
            "name" => $request->colegio,
            "url" => $colegio
        ]);    
        
        $user = User::create([
            "first_name" => $request->name,
            "last_name" => "",
            "email" => $request->email,
            "email2" => $request->email,
            "password" => bcrypt($request->password),
            "role_id" => 1,
            "state_id" => 1,
            "privacy_policy" => 1,
            "plataforma" => 2
        ]);
        
        $colegioUsuario = ColegioUsuario::create([
            "colegio_id" => $colegio->id,
            "user_id" => $user->id
        ]);
        
        Auth()->login($user);
        
        return redirect("/");
    }
    
    private function validarColegio($colegio){        
        return Colegio::selectRaw("count(*) as num")->where("url", $colegio)->get()->last()->num > 0;
    }
}
