<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\State;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{

    public function showList(Request $request)
    {
        $tipo = $request->input('tipo');
        $name = $request->input('name');
        $lastName = $request->input('lastName');
        $email = $request->input('email');
        $filterState = $request->input('state');
        $orderDateCreate = $request->input('orderDateCreate');
        $filtrerDateCreateStart = $request->input('filtrerDateCreateStart');
        $filtrerDateCreateFinish = $request->input('filtrerDateCreateFinish');
        $download = $request->input('download');
        $users = User::with('state', 'role');
        $states = State::statesForUsers()->pluck('state', 'id');
        if($tipo != ''){
            $users->where('group', $tipo == 1 ? 0 : 1);
        }
        if($name != ''){
            $users->where('first_name', 'LIKE', "%$name%");
        }
        if($lastName != ''){
            $users->where('last_name', 'LIKE', "%$lastName%");
        }
        if($email != ''){
            $users->where('email2', 'LIKE', "%$email%");
        }
        if($filterState != ''){
            $users->where('state_id', $filterState);
        }
        if($orderDateCreate != ''){
            $users->orderBy('created_at', $orderDateCreate);
        }
        if($filtrerDateCreateStart != '' && $filtrerDateCreateFinish != ''){
            $users->whereBetween('created_at', [$filtrerDateCreateStart, $filtrerDateCreateFinish]);
        }
        if($download == 1){
            $this->exportExcel($users->get());

        }
        $users = $users->paginate(6);
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
