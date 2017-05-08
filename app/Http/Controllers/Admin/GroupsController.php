<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Groups;
use App\Models\State;
use Maatwebsite\Excel\Facades\Excel;


class GroupsController extends Controller
{
    public function showList(Request $request){

        $filterName = $request->input('filterName');
        $filterAdmin = $request->input('filterAdmin');
        $filterState = $request->input('filterState');
        $orderDateCreate = $request->input('orderDateCreate');
        $filtrerDateCreateStart = $request->input('filtrerDateCreateStart');
        $filtrerDateCreateFinish= $request->input('filtrerDateCreateFinish');
        $download = $request->input('download');

        $states = State::statesForGroups()->get();

        $groups = Groups::select('groups.*')->join('users', 'users.id', '=', 'groups.admin_id');

        if($filterName != ''){
            $groups->where("name", "LIKE", "%$filterName%");
        }
        if($filterAdmin != ''){
            $groups->whereRaw("(users.first_name LIKE '%$filterAdmin%' OR users.last_name LIKE '%$filterAdmin%')");
        }

        if($filterState != ''){
            $groups->where("groups.state_id", $filterState);
        }
        if($filtrerDateCreateStart != '' && $filtrerDateCreateFinish != ''){
            $groups->whereBetween('groups.created_at', [$filtrerDateCreateStart, $filtrerDateCreateFinish]);
        }
        if($orderDateCreate != ''){
            $groups->orderBy("groups.created_at", $orderDateCreate);
        }
         if($download == 1){
            $this->exportExcel($groups->get());
        }
        //dd($groups);
        $groups = $groups->paginate(12);
        return view("admin/groups/list", compact("groups", "states"));
    }

    private function exportExcel($groups){

        $data = [];

        foreach($groups as $group){
            $data[] = [
                'Nombre' => $group->name,
                'Description' => $group->description,
                'Administrador' => $group->admin->first_name." ".$group->admin->last_name,
                'Estado' => $group->state->state,
                'Fecha creacion' => $group->created_at,
                'Colaboradores' => $group->collaborators->first()->user->first_name." ".$group->collaborators->first()->user->last_name
            ];

            foreach($group->collaborators->splice(1) as $collaborator){
                $data[] = [
                   'Nombre' => '',
                    'Description' => '',
                    'Administrador' => '',
                    'Estado' => '',
                    'Fecha creacion' => '',
                    'Colaboradores' => $collaborator->user->first_name." ".$collaborator->user->last_name

                ];
            }
        }

        Excel::create('GruposCambalachea' . date("Y-m-d"), function ($excel) use ($data) {
            $excel->sheet('Grupos', function ($sheet) use ($data) {

                $sheet->fromArray($data);

            });
        })->download('xls');

    }
}
