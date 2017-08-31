<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Deal;
use App\Models\State;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DealsController extends Controller
{
    public function showList(Request $request){

        $filterService = $request->input('filterService');
        $filterApplicant = $request->input('filterApplicant');
        $filterOfferer = $request->input('filterOfferer');
        $filterState = $request->input('filterState');
        $orderDateCreate = $request->input('orderDateCreate');
        $filtrerDateCreateStart = $request->input('filtrerDateCreateStart');
        $filtrerDateCreateFinish= $request->input('filtrerDateCreateFinish');
        $download = $request->input('download');

        $states = State::statesForDeals()->get();

        $deals = Deal::select("deals.*")
                        ->join('services', 'services.id', '=', 'deals.service_id')
                        ->join("users", "users.id", "=", "deals.user_id")
                        ->join("users as offerer", "offerer.id", "=", "services.user_id");
        if($filterService != ''){
            $deals->where("services.name", "LIKE", "%$filterService%");
        }
        if($filterApplicant != ''){
            $deals->whereRaw("(users.first_name LIKE '%$filterApplicant%' OR users.last_name LIKE '%$filterApplicant%')");
        }
        if($filterOfferer != ''){
            $deals->whereRaw("(offerer.first_name LIKE '%$filterOfferer%' OR offerer.last_name LIKE '%$filterOfferer%')");
        }
        if($filterState != ''){
            $deals->where("deal.state_id", $filterState);
        }
        if($filtrerDateCreateStart != '' && $filtrerDateCreateFinish != ''){
            $deals->whereBetween('deals.created_at', [$filtrerDateCreateStart, $filtrerDateCreateFinish]);
        }
        if($orderDateCreate != ''){
            $deals->orderBy("deals.created_at", $orderDateCreate);
        }
         if($download == 1){
            $this->exportExcel($deals->get());
        }
        //dd($deals);
        $deals = $deals->paginate(12);
        return view("admin/deals/list", compact("deals", "states"));
    }

    private function exportExcel($deals){

        $data = [];

        foreach($deals as $deal){
            $data[] = [
                'Servicio' => $deal->service->name,
                'Demandante' => $deal->user->first_name." ".$deal->user->last_name,
                'Ofertante' => $deal->service->user->first_name." ".$deal->service->user->last_name,
                'Estado' => $deal->dealStates->last()->state->state,
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
