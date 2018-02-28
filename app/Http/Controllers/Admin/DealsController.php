<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Deal;
use App\Models\State;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DealsController extends Controller
{
    public function showList(Request $request){

        $deals = Deal::select("deals.*")->join('services', 'services.id', '=', 'deals.service_id')->join("users", "users.id", "=", "deals.user_id")->join("users as offerer", "offerer.id", "=", "services.user_id");

        if($request->name != ''){
            $deals->where("services.name", "LIKE", "%$request->name%");
        }
        if($request->applicant != ''){
            $deals->whereRaw("(users.first_name LIKE '%$request->applicant%' OR users.last_name LIKE '%$request->applicant%')");
        }
        if($request->typeApplicant != ''){
            $deals->where("users.group", $request->typeApplicant == 2 ? 1 : 0);
        }
        if($request->ofertant != ''){
            $deals->whereRaw("(offerer.first_name LIKE '%$request->ofertant%' OR offerer.last_name LIKE '%$request->ofertant%')");
        }
        if($request->typeOfertant != ''){
            $deals->where("offerer.group", $request->typeOfertant == 2 ? 1 : 0);
        }
        if($request->category != ''){
            $deals->where("services.category_id", $request->category);
        }
        if($request->state != ''){
            $deals->where("deals.state_id", $request->state);
        }
        if($request->fecha != ''){
            $fecha = explode("|", $request->fecha);
            $deals->whereBetween("deals.date", $fecha);
        }

        if($request->download != ''){
            $this->exportExcel($deals->get());
        }

        $deals = $deals->paginate(12);

        $states = State::statesForDeals()->get();

        $categories = Category::all();

        return view("admin/deals/list", compact("deals", "states", "categories"));
    }

    private function exportExcel($deals){

        $data = [];

        foreach($deals as $deal){
            $data[] = [
                'Servicio' => $deal->service->name,
                'Demandante' => $deal->user->first_name." ".$deal->user->last_name,
                'Tipo Demandante' => $deal->user->group == 1 ? "Grupo" : "Persona",
                'Ofertante' => $deal->service->user->first_name." ".$deal->service->user->last_name,
                'Tipo Ofertante' => $deal->service->user->group  == 1 ? "Grupo" : "Persona",
                'Categoria' => $deal->service->category->category,
                'Estado' => $deal->state->state,
                'Descripcion' => $deal->description,
                'Dorados' => $deal->value,
                'Lugar' => $deal->location,
                'Fecha del trato' => $deal->date." ".$deal->time,
                'Fecha creacion' => $deal->created_at
            ];
        }

        Excel::create('TratosCambalachea' . date("Y-m-d"), function ($excel) use ($data) {
            $excel->sheet('Tratos', function ($sheet) use ($data) {

                $sheet->fromArray($data);

            });
        })->download('xls');

    }

}
