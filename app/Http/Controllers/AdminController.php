<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
use App\Models\Service;
use App\Models\AdminContent;
use App\Models\State;
use App\Models\HistoryDonations;
use Session;
use Validator;
use Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function AdminLogin()
    {
        return view('admin/login');
    }

    public function homeAdmin()
    {
        return view('admin/homeAdmin');
    }

    public function homeAdminUser()
    {
        $users = User::with('state', 'role')->orderBy('created_at', 'desc')->paginate(6);
        $states = State::whereIn('id', [1, 3])->pluck('state', 'id');
        return view('admin/users/list', compact('users', 'states'));
    }

    public function homeAdminServices(Request $request)
    {
        $services = Service::orderBy('updated_at', 'desc');
        $services = $request->find != '' ? $services->where('name', 'LIKE', "%$request->find%") : $services;
        $services = $services->paginate(6);
        $states = State::whereIn('id', array(1, 3))->pluck('state', 'id');
        return view('admin/services/list', compact('services', 'states'));
    }

    public function adminGroups(Request $request)
    {
        $groups = Groups::orderBy('updated_at', 'desc');
        $groups = $request->find != '' ? $groups->where('name', 'LIKE', "%$request->find%") : $groups;
        $groups = $groups->paginate(6);
        $states = State::whereIn('id', array(1, 3))->pluck('state', 'id');
        return view('admin/groups/list', compact('groups', 'states'));
    }

    public function showServicesReported(Request $request)
    {
        $services = Service::Select("services.*")->join('reports', 'reports.service_id', '=', 'services.id')->orderBy('updated_at', 'desc');
        $services = $request->find != '' ? $services->where('name', 'LIKE', "%$request->find%") : $services;
        $services = $services->paginate(6);
        $states = State::whereIn('id', array(1, 2))->pluck('state', 'id');
        return view('admin/services/list', compact('services', 'states'));
    }

    public function store(Request $request)
    {
        try {
            $ifexistUser = User::whereEmail($request->email)->first();

            if (!$ifexistUser) {
                $rules = [
                    'first_name' => 'required|min:3|alpha_spaces',
                    'last_name' => 'required|min:3|alpha_spaces',
                    'email' => 'required|email'
                ];

                $validator = Validator::make($request->all(), $rules);

                if ($validator->fails()) {
                    return redirect()->back()->withInput()->withErrors($validator->errors());
                } else {
                    $user = new User;
                    $user->first_name = $request->first_name;
                    $user->last_name = $request->last_name;
                    $user->email2 = $request->email;
                    $user->password = bcrypt('secret');
                    $user->state_id = 1;
                    $user->role_id = 1;
                    $user->privacy_policy = 1;

                    if ($user->save()) {
                        Session::flash('success', '¡El Usuario con E-Mail ' . $request->email . ' Se Registro con Exito!');
                        return redirect('homeAdminUser');
                    }
                }
            } else {
                Session::flash('error', '¡El Usuario con E-Mail ' . $request->email . ' Ya Existe!');
                return redirect('homeAdminUser');
            }

        } catch (Exception $e) {
        }
    }

    public function showServices(Request $request)
    {
        if ($request->name != '') {
            $services = Service::where('name', 'LIKE', "%$request->name%")->paginate(6);
            $states = State::whereIn('id', array(1, 2))->pluck('state', 'id');
            return view('admin/services/list', compact('services', 'states'));
        } else {
            return redirect('homeAdminServices');
        }
    }

    public function index()
    {
        $contents = AdminContent::orderBy('created_at', 'desc')->paginate(6);
        return view('admin/contents/list', compact('contents'));
    }

    public function updateContent(Request $request)
    {
        $cont = AdminContent::find($request->id);
        $cont->name = $request->name;
        $cont->description = $request->input('content');

        if ($cont->save()) {
            Session::flash('success', '¡El contenido ' . $request->category . ' Se Registró con Exito!');
            return redirect('homeAdminContents');
        }
    }

    public function show(Request $request)
    {
        if ($request->name != '') {
            $users = User::where('first_name', 'LIKE', "%$request->name%")->paginate(6);
            $states = State::whereIn('id', [1, 3])->pluck('state', 'id');
            return view('admin/users/list', compact('users', 'states'));
        } else {
            return redirect('homeAdminUser');
        }
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

    public function updateServiceState(Request $request)
    {
        $service = Service::find($request->id);

        $service->state_id = $request->state_id;
        if ($service->save()) {
            Session::flash('success', '¡El estado de la oferta ha cambiado con exito!');
            return redirect('homeAdminServices');
        }

    }

    public function updateGroupState(Request $request)
    {
        $group = Groups::find($request->id);

        $group->state_id = $request->state_id;

        if ($group->save()) {
            Session::flash('success', '¡El estado de la oferta ha cambiado con exito!');
            return redirect('adminGroups');
        }

    }

    public function updateServices(Request $request)
    {
        try {
            $rules = [
                'name' => 'required|min:3|alpha_spaces'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator->errors());
            } else {
                $service = Service::find($request->id);
                $service->state_id = $request->state;

                if ($user->save()) {
                    Session::flash('success', '¡La oferta con nombre ' . $request->name . ' fue cambiada de estado con Exito!');
                    return redirect('homeAdminUser');
                } else {
                    Session::flash('error', '¡Error con actualizar el estado de la oferta con nombre ' . $request->name);
                    return redirect('homeAdminUser');
                }
            }
        } catch (Exception $e) {
        }
    }

    /**
     * Redirect View Change Password User Admin.
     */

    public function changePassword()
    {
        return view('admin/changePasswordAdmin');
    }

    /**
     * Method Change Password User Admin.
     */
    public function changePasswordAdmin(Request $request)
    {
        $rules = [
            'last_password' => 'required|min:6',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|min:6'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } else {

            $user = User::find(\Auth::user()->id);

            if (hash::check($request->last_password, $user->password)) {
                if ($request->new_password == $request->confirm_password) {
                    $user->password = bcrypt($request->new_password);
                    $user->save();
                    \Session::flash('success', 'Contraseña Actualizada Satisfactoriamente');
                    return redirect('homeAdmin');
                } else {
                    \Session::flash('error', 'Las contraseñas no coinciden');
                }
            } else {
                \Session::flash('error', 'La contraseña suministrada no es la correcta');
            }


            return redirect('changePassword');
        }
    }

    public function historyDonations(Request $request){
        $findDonor = $request->input('findDonor', '');
        $findCampaign = $request->input('findcampaign', '');
        $history = HistoryDonations::select("history_donations.*")->orderBy('updated_at', 'desc');

        if($findDonor != ''){
            $history->join('users', 'users.id', 'history_donations.donor_id')->where("users.first_name", 'LIKE', "%$findDonor%")->orWhere("users.last_name", 'LIKE', "%$findDonor%");
        }

        if($findCampaign != ''){
            $history->join('campaigns', 'campaigns.id', 'history_donations.campaign_id')->where("campaigns.name", 'LIKE', "%$findCampaign%");
        }

        if($request->input('download') == 'true'){
            $this->exportExcel($history);
        }

        $history = $history->paginate(12);

        return view("admin/history/donations", compact('history'));

    }

    private function exportExcel($history){
        $history = $history->get();
        $data = [];
        foreach($history as $row){
            $data[] = ["Donador" => $row->donor->first_name." ".$row->donor->last_name, "Campaña" => $row->campaign->name, "Dorados" => $row->credits, "Fecha" => $row->created_at];
        }
        Excel::create('DonadoresCambalachea'.date("Y-m-d"), function($excel) use ($data) {
            $excel->sheet('Productos', function($sheet) use ($data) {

                $sheet->fromArray($data);

            });
        })->export('xls');

        return redirect()->back();
    }

}
