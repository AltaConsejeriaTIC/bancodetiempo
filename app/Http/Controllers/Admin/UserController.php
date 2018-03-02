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
        if($request->plataforma != ''){
            $users->where('plataforma', $request->plataforma);
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
            $this->exportExcel($users->get(), $request->tipoReporte);
        }
        
        $users = $users->paginate(20);
        
        return view('admin/users/list', compact('users', 'states'));

    }

    private function exportExcel($users, $type = 0){

        $data = [];
        $header = ['Nombres',
                   'Apellidos',
                   'Email',
                   'Genero',
                   'Fecha Nacimiento',
                   'Descripcion',
                   'Dorados',
                   'Ranking',
                   'Estado',
                   'Servicios ofertados',
                   'Servicios adquiridos',
                   'Tipo usuario',
                   'Fecha de creación'];
        foreach($users as $user){
            $data[] = [
                'Nombres' => $user->first_name,
                'Apellidos' => $user->last_name,
                'Email' => $user->email2,
                'Genero' => $user->gender,
                'Fecha Nacimiento' => $user->birthDate,
                'Descripcion' => $user->aboutMe,
                'Dorados' => "$user->credits",
                'Ranking' => is_null($user->ranking) ? "0" : "$user->ranking",
                'Estado' => $user->state->state,
                'Servicios ofertados' => "".$user->services->count()."",
                'Servicios adquiridos' => "".Helpers::countDealsFinished($user)."",
                'Tipo usuario' => $user->group == 0 ? "Persona" : "Grupo",
                'Fecha de creación' => $user->created_at
            ];

            if($type == 1){
                foreach($user->services as $index => $service){
                    if($index>0){
                        $data[] = [
                            'Nombres' => "",
                            'Apellidos' => "",
                            'Email' => "",
                            'Genero' => "",
                            'Fecha Nacimiento' => "",
                            'Descripcion' => "",
                            'Dorados' => "",
                            'Ranking' => "",
                            'Estado' => "",
                            'Servicios ofertados' => "",
                            'Servicios adquiridos' => "",
                            'Tipo usuario' => "",
                            'Fecha de creación' => ""
                        ];
                    }
                    $k = array_last(array_keys($data));

                    $data[$k]['Nombre Servicios'] = $service->name;
                    $data[$k]['Descripcion servicio'] = $service->description;
                    $data[$k]['Estado servicio'] = $service->state->state;
                    $data[$k]['Fecha creacion servicio'] = $service->created_at;
                    $data[$k]['Modalidad servicio'] = ($service->virtually == 0 ? "" : "Virtual")." ".($service->presently == 0 ? "" : "Presencial");
                    $data[$k]['Categoria servicio'] = $service->category->category;
                    $data[$k]['Ranking servicio'] = is_null($service->ranking) ? "0" : "$service->ranking";

                }

                $header = ['Nombres',
                           'Apellidos',
                           'Email',
                           'Genero',
                           'Fecha Nacimiento',
                           'Descripcion',
                           'Dorados',
                           'Ranking',
                           'Estado',
                           'Servicios ofertados',
                           'Servicios adquiridos',
                           'Tipo usuario',
                           'Fecha de creación',
                           'Nombre Servicio',
                           'Descripcion servicio',
                           'Estado servicio',
                           'Fecha creacion servicio',
                           'Modalidad servicio',
                           'Categoria servicio',
                           'Ranking servicio'];
            }

            if($type == 2){
                $index = 0;
                if($user->conversations->count() != 0){
                    foreach($user->conversations as $conversation){
                        foreach($conversation->deals as $deal){
                            if($deal->state_id == 10){
                                if($index>0){
                                    $data[] = [
                                        'Nombres' => "",
                                        'Apellidos' => "",
                                        'Email' => "",
                                        'Genero' => "",
                                        'Fecha Nacimiento' => "",
                                        'Descripcion' => "",
                                        'Dorados' => "",
                                        'Ranking' => "",
                                        'Estado' => "",
                                        'Servicios ofertados' => "",
                                        'Servicios adquiridos' => "",
                                        'Tipo usuario' => "",
                                        'Fecha de creación' => ""
                                    ];
                                }
                                $k = array_last(array_keys($data));

                                $data[$k]['Nombre Servicio'] = $deal->service->name;
                                $data[$k]['Descripcion Servicio'] = $deal->service->description;
                                $data[$k]['Estado Servicios'] = $deal->service->state->state;
                                $data[$k]['Fecha creacion Servicio'] = $deal->service->created_at;
                                $data[$k]['Modalidad Servicio'] = ($deal->service->virtually == 0 ? "" : "Virtual")." ".($deal->service->presently == 0 ? "" : "Presencial");
                                $data[$k]['Categoria Servicio'] = $deal->service->category->category;
                                $data[$k]['Ranking Servicio'] = is_null($deal->service->ranking) ? "0" : "".$deal->service->ranking."";
                                $data[$k]['Ofertante Servicio'] = $deal->service->user->first_name." ".$deal->user->last_name;
                                $data[$k]['Fecha Trato'] = $deal->date." ".$deal->time;
                                $data[$k]['Lugar Trato'] = $deal->location;
                                $data[$k]['Dorados Trato'] = "".$deal->value."";
                                $data[$k]['Descripcion Trato'] = $deal->description;
                                $index += 1;
                            }
                        }
                    }
                }
                $header = ['Nombres',
                           'Apellidos',
                           'Email',
                           'Genero',
                           'Fecha Nacimiento',
                           'Descripcion',
                           'Dorados',
                           'Ranking',
                           'Estado',
                           'Servicios ofertados',
                           'Servicios adquiridos',
                           'Tipo usuario',
                           'Fecha de creación',
                           'Nombre Servicio',
                           'Descripcion servicio',
                           'Estado servicio',
                           'Fecha creacion servicio',
                           'Modalidad servicio',
                           'Categoria servicio',
                           'Ranking servicio',
                           'Ofertante Servicio',
                           'Fecha Trato',
                           'Lugar Trato',
                           'Dorados Trato',
                           'Descripcion Trato'];
            }


        }
        //dd($data);
        Excel::create('UsuariosCambalachea' . date("Y-m-d"), function ($excel) use ($data, $header) {
            $excel->sheet('Usuarios', function ($sheet) use ($data, $header) {
                $sheet->fromArray($data);
                $sheet->row(1, $header);

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
            "first_name" => $user->first_name,
            "last_name" => $user->last_name,
            "gender" => $user->gender,
            "group" => $user->group,
            "ranking" => is_null($user->ranking) ? 0 : $user->ranking,
            "state" => $user->state->state,
            "state_id" => $user->state_id,
            "id" => $user->id
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
    
    public function updateUser(Request $request){
        $user = User::find($request->id);
        $user->update([
            "first_name" => $request->name,
            "last_name" => $request->lastname,
            "email" => $request->email,
            "state_id" => $request->state
        ]);
    }

    public function update(Request $request)
    {
        try {
            $rules = [
                'first_name' => 'required|min:3|alpha_spaces',
                'last_name' => 'required|min:3|alpha_spaces',
                'email' => 'required|email'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator->errors());
            } else {
                $user = User::find($request->id);
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->email = $request->email;
                $user->password = bcrypt('secret');
                $user->state_id = $request->state_id;

                if ($user->save()) {
                    Session::flash('success', '¡El Usuario con E-Mail ' . $request->email . ' Se Actualizó con Exito!');
                    return redirect('homeAdminUser');
                } else {
                    Session::flash('error', '¡El Usuario con E-Mail ' . $request->email . ' NO se Actualizó!');
                    return redirect('homeAdminUser');
                }
            }
        } catch (Exception $e) {
        }
    }

}
