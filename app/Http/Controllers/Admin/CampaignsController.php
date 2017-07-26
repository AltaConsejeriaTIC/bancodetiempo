<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Campaigns;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\State;
use Session;

class CampaignsController extends Controller
{

    public function showList(Request $request)
    {
        $campaigns = Campaigns::orderBy('updated_at', 'desc');
        if($request->find != ""){
            $campaigns = $request->find != '' ? $campaigns->where('name', 'LIKE', "%$request->find%") : $campaigns;
        }
        $campaigns = $campaigns->paginate(6);
        $states = State::whereIn('id', array(1, 3))->pluck('state', 'id');
        return view('admin/campaigns/list', compact('campaigns', 'states'));
    }

    public function updateCampaignState(Request $request)
    {
        $campaign = Campaigns::find($request->id);
        $campaign->state_id = $request->state_id;

        if ($campaign->save()) {
            if ($campaign->state_id == 3) {
                $this->cancelCampaign($campaign);
            }

            Session::flash('success', '¡El estado de la oferta ha cambiado con exito!');
            return redirect()->back();
        }

    }

    public function cancelCampaign($campaign){
        if($campaign->participants->count() > 0) {
            $this->sendEmailToCampaignParticipants($campaign);
        }

        if($campaign->credits > 0) {
            $this->giveBackCreditsToCampaignDonors($campaign);
        }
    }

    public function sendEmailToCampaignParticipants($campaign){
        print_r('Unimplemented yet');
        dd($campaign->participants);
    }

    public function giveBackCreditsToCampaignDonors($campaign){
        dd('Unimplemented yet');
    }


    public function downloadParticipant($campaign_id){

        $campaign = Campaigns::find($campaign_id);

        $participants = [];

        foreach($campaign->participants as $participant){
            $participants[] = [
                "Nombre" => $participant->participant->first_name." ".$participant->participant->last_name,
                "Email" => $participant->participant->email2,
                "Fecha inscripcion" => $participant->created_at,
                "Asistencia" => $participant->presence ? "Si" : "No",
                "Tipo de inscripcion" => $participant->confrimed ? "Inscrito" : "Pre-inscrito"
            ];
        }

        Excel::create('Campaña' . $campaign_id . date("Y-m-d"), function ($excel) use ($participants) {
            $excel->sheet('participantes', function ($sheet) use ($participants) {

                $sheet->fromArray($participants);

            });
        })->download('xls');
    }
}
