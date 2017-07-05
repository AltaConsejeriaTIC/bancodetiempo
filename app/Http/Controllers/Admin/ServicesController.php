<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicesController extends Controller
{
    public function homeAdminServices(Request $request){
        $services = Service::orderBy('updated_at', 'desc');
        $services = $request->find != '' ? $services->where('name', 'LIKE', "%$request->find%") : $services;
        $services = $services->paginate(6);
        $states = State::whereIn('id', array(1, 3))->pluck('state', 'id');
        return view('admin/services/list', compact('services', 'states'));
    }

    public function showServicesReported(Request $request){
        $services = Service::Select("services.*")->join('reports', 'reports.service_id', '=', 'services.id')->orderBy('updated_at', 'desc');
        $services = $request->find != '' ? $services->where('name', 'LIKE', "%$request->find%") : $services;
        $services = $services->paginate(6);
        $states = State::whereIn('id', array(1, 2))->pluck('state', 'id');
        return view('admin/services/list', compact('services', 'states'));
    }
    public function updateServiceState(Request $request){
        $service = Service::find($request->id);
        $service->state_id = $request->state_id;
        if ($service->save()) {
            Session::flash('success', '¡El estado de la oferta ha cambiado con exito!');
            return redirect('homeAdminServices');
        }

    }
}
