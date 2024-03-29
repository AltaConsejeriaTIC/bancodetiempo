<?php

namespace App\Http\Controllers;

use App\Models\Campaigns;
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
use Mail;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



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



    public function adminGroups(Request $request)
    {
        $groups = Groups::orderBy('updated_at', 'desc');
        $groups = $request->find != '' ? $groups->where('name', 'LIKE', "%$request->find%") : $groups;
        $groups = $groups->paginate(6);
        $states = State::whereIn('id', array(1, 3))->pluck('state', 'id');
        return view('admin/groups/list', compact('groups', 'states'));
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


    public function sendMailToParticipants($campaign)
    {
        foreach ($campaign->participants as $participant) {
            $email = $participant->participant->email2;

            Mail::send('mailCancelCampaign', ["campaign" => $campaign, "participant" => $participant->participant], function ($message) use ($email, $campaign) {
                $message->from('evenvivelab_bog@unal.edu.co', 'Cambalachea!');
                $message->subject('La campaña '. $campaign->name." fue cancelada");
                $message->to($email);
            });
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





    private function exportExcel($history)
    {
        $history = $history->get();
        $data = [];
        foreach ($history as $row) {
            $data[] = ["Donador" => $row->donor->first_name . " " . $row->donor->last_name, "Campaña" => $row->campaign->name, "Dorados" => $row->credits, "Fecha" => $row->created_at];
        }
        Excel::create('DonadoresCambalachea' . date("Y-m-d"), function ($excel) use ($data) {
            $excel->sheet('Productos', function ($sheet) use ($data) {

                $sheet->fromArray($data);

            });
        })->export('xls');

        return redirect()->back();
    }

}
