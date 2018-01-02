<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
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
        
        if($request->download == 1){
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
                'Estado' => $user->state->state
            ];
        }

        Excel::create('UsuariosCambalachea' . date("Y-m-d"), function ($excel) use ($data) {
            $excel->sheet('Usuarios', function ($sheet) use ($data) {

                $sheet->fromArray($data);

            });
        })->download('xls');

    }

}
