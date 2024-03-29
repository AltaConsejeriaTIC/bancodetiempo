<?php

namespace App\Http\Controllers\Colegios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\Colegio;
use App\Models\ColegioUsuario;
use App\User;
use App\Helpers;

class RegisterController extends Controller
{
    public function registroFormAdmin(Request $request){
        return view("colegios/admin/registro");
    }
    public function registroFormStudent(Request $request){
        $listSchool = Colegio::all("id", "name");
        return view("colegios/estudiante/registro", compact("listSchool"));
    }
    
    public function registroAdmin(Request $request){
        
        $validator = Validator::make($request->all(), [
            "colegio" => "required",
            "password" => "required",
            "email" => "required|email|unique:users,email|unique:users,email2",
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
        
        if(!is_null($request->file("foto"))){
            $cover = Helpers::uploadImage($request->file('foto'), 'user' . date("Ymd") . rand(000, 999), 'resources/user/user_' . $user->id . '/cover/');
            $user->update([
                "avatar" => $cover
            ]);
        }
        
        $colegioUsuario = ColegioUsuario::create([
            "colegio_id" => $colegio->id,
            "user_id" => $user->id
        ]);
        Auth()->login($user);
        return redirect("/inicio");
    }
    
    public function registroStudent(Request $request){
        
        $validator = Validator::make($request->all(), [
            "colegio" => "required",
            "password" => "required",
            "email" => "required|email|unique:users,email|unique:users,email2",
            "name" => "required",
            "terminos" => "required",
            "fecha" => "required",
            "curso" => "required",
            "genero" => "required",
            "documento" => "required",
        ]);
        
        
        $user = User::create([
            "first_name" => $request->name,
            "last_name" => "",
            "email" => $request->email,
            "email2" => $request->email,
            "password" => bcrypt($request->password),
            "role_id" => 2,
            "state_id" => 1,
            "privacy_policy" => 1,
            "plataforma" => 2,
            "birthDate" => $request->fecha,
            "gender" => $request->genero,
            "document" => $request->documento,
            "course" => $request->curso
        ]);
        
        if(!is_null($request->file("foto"))){
            $cover = Helpers::uploadImage($request->file('foto'), 'user' . date("Ymd") . rand(000, 999), 'resources/user/user_' . $user->id . '/cover/');
            $user->update([
                "avatar" => $cover
            ]);
        }     
        
        
        $colegioUsuario = ColegioUsuario::create([
            "colegio_id" => $request->colegio,
            "user_id" => $user->id
        ]);
        
        Auth()->login($user);
        
        return redirect("/inicio");
        
    }
    
    private function validarColegio($colegio){        
        return Colegio::selectRaw("count(*) as num")->where("url", $colegio)->get()->last()->num > 0;
    }
}
