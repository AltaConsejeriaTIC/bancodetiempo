<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Helpers;
use App\Models\State;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{

    public function showList(Request $request){
        
        $users = User::select("users.*")->with('state', 'role');
        
        if($request->tipo != ''){
            $users->where('group', $request->tipo == 1 ? 0 : 1);
        }
        if($request->name != ''){
            $users->where('first_name', 'LIKE', "%$request->name%");
        }
        if($request->lastName != ''){
            $users->where('last_name', 'LIKE', "%$request->lastName%");
        }
        if($request->email != ''){
            $users->where('email2', 'LIKE', "%$request->email%");
        }
        if($request->state != ''){
            $users->where('state_id', $request->state);
        }
        if($request->ofertados != ''){
            $users->whereRaw("(SELECT count(*) FROM services where user_id = users.id) = $request->ofertados");
        }
        if($request->adquiridos != ''){
            $users->whereRaw("(SELECT count(*) FROM conversations INNER JOIN deals on deals.conversations_id = conversations.id where applicant_id = users.id AND deals.state_id = 10) = $request->adquiridos");
        }
        if($request->fecha != ''){
            $fecha = explode("|", $request->fecha);
            $users->whereBetween("created_at", $fecha);
        }
        
        if($request->download != ""){
            $this->exportExcel($users->get());
        }
        
        $users = $users->paginate(20);
        
        return view('admin/users/list', compact('users', 'states'));

    }

    private function exportExcel($users){

        $data = [];

        foreach($users as $user){
            $data[] = [
                'Nombres' => $user->first_name,
                'Apellidos' => $user->last_name,
                'Email' => $user->email2,
                'Genero' => $user->gender,
                'Fecha Nacimiento' => $user->birthDate,
                'Descripcion' => $user->aboutMe,
                'Dorados' => $user->credits,
                'Ranking' => $user->ranking,
                'Estado' => $user->state->state,
                'Servicios ofertados' => $user->services->count(),
                'Servicios adquiridos' => Helpers::countDealsFinished($user),
                'Tipo usuario' => $user->group == 0 ? "Persona" : "Grupo",
                'Fecha de creación' => $user->created_at
            ];
        }

        Excel::create('UsuariosCambalachea' . date("Y-m-d"), function ($excel) use ($data) {
            $excel->sheet('Usuarios', function ($sheet) use ($data) {

                $sheet->fromArray($data);

            });
        })->download('xls');

    }
    
    public function getDetail(Request $request){
        $user = User::find($request->user);
        $json = [
            "aboutMe" => $user->aboutMe,
            "avatar" => $user->avatar,
            "birthDate" => $user->birthDate,
            "created_at" => $user->created_at,
            "credits" => $user->credits,
            "email" => $user->email2,
            "name" => $user->first_name." ".$user->last_name,
            "gender" => $user->gender,
            "group" => $user->group,
            "ranking" => $user->ranking,
            "state" => $user->state->state
        ];
        
        foreach($user->services as $service){
            $modalidad = $service->virtually === 1 ? "Virtual" : "";
            $modalidad = $modalidad != "" ? " / " : "";
            $modalidad = $service->presently === 1 ? "Presencial" : "";
            
            $json["serviciosOfrecidos"][] = [
                "nombre" => $service->name,
                "valor" => $service->value,
                "modalidad" => $modalidad,
                "categoria" => $service->category->category,
                "estado" => $service->state->state
            ];
        }
        
        if($user->conversations->count() != 0){
            foreach($user->conversations as $conversation){
                foreach($conversation->deals as $deal){
                    $modalidad = $deal->service->virtually === 1 ? "Virtual" : "";
                    $modalidad = $modalidad != "" ? " / " : "";
                    $modalidad = $deal->service->presently === 1 ? "Presencial" : "";
                    $json["serviciosAdquiridos"][] = [
                        "nombre" => $deal->service->name,
                        "valor" => $deal->value,
                        "modalidad" => $modalidad,
                        "categoria" => $service->category->category,
                        "estado" => $deal->state->state
                    ];
                }
            }
        }
        
        return response()->json($json);
    }

}
