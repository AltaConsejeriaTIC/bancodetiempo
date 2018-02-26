<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\State;
use Session;

class ServicesController extends Controller
{
    public function index(Request $request){
        $services = Service::orderBy('services.created_at', 'desc');

        if($request->name != ''){
            $services->where("name", "like", "%$request->name%");
        }
        if($request->description != ''){
            $services->where("description", "like", "%$request->description%");
        }
        if($request->state != ''){
            $services->where("state_id", $request->state);
        }
        if($request->fecha != ''){
            $fecha = explode("|", $request->fecha);
            $services->whereBetween("created_at", $fecha);
        }
        if($request->creator != ''){
            $services->select("services.*")->join('users', 'users.id', "=", "services.user_id")->whereRaw("(users.first_name like '%$request->creator%' OR users.last_name like '%$request->creator%')");
        }
        if($request->deals != ''){
            $services->select("services.*")->whereRaw("(select count(*) from deals where state_id = 10 AND service_id = services.id) = ".$request->deals);
        }

        $services = $services->paginate(6);

        return view('admin/services/list', compact('services'));
    }

    public function getDetail(Request $request){
        $response = [];
        $service = Service::where("id", $request->service);
        if(is_null($service)){
            $response["status"] = "failed";
            $response["message"] = "El servicio solicitado no existe";
        }

        $response = $service->get(["name", "description", "value", "virtually", "presently", "image", "ranking", "created_at"])->last();
        $lastService = $service->get()->last();
        $response["state"] = $lastService->state->state;
        $response["category"] = $lastService->category->category;
        $response["user_name"] = $lastService->user->first_name." ".$lastService->user->last_name;
        $response["avatar"] = $lastService->user->avatar;
        $deals = $lastService->deals->toArray();
        foreach($lastService->deals as $key => $deal){
            $deals[$key]["user"] = $deal->user->toArray();
            $deals[$key]["state"] = $deal->state->state;
        }
        $response["deals"] = $deals;

        return response()->json($response->toArray());
    }

    public function showServicesReported(Request $request){
        $services = Service::Select("services.*")->join('reports', 'reports.service_id', '=', 'services.id')->orderBy('updated_at', 'desc');
        $services = $request->find != '' ? $services->where('name', 'LIKE', "%$request->find%") : $services;
        $services = $services->paginate(6);
        $states = State::whereIn('id', array(1, 2))->pluck('state', 'id');
        return view('admin/services/list', compact('services', 'states'));
    }
    public function changeState(Request $request){
        $response = [];
        $service = Service::find($request->service);
        if(is_null($service)){
            $response["status"] = "failed";
            $response["message"] = "El servicio no existe";
        }else{
            $service->update([
                "state_id" => $request->state
            ]);
            $response["status"] = "success";
            $response["message"] = "Estado cambio con exito";
            $response["state"] = $service->state->state;
        }

        return response()->json($response);

    }
}
