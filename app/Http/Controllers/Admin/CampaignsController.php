<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Campaigns;
use Maatwebsite\Excel\Facades\Excel;

class CampaignsController extends Controller
{
    public function downloadParticipant($campaign_id){

        $campaign = Campaigns::find($campaign_id);

        $participants = [];

        foreach($campaign->participants as $participant){
            $participants[] = [
                "Nombre" => $participant->participant->first_name." ".$participant->participant->last_name,
                "Email" => $participant->participant->email2,
                "Fecha inscripcion" => $participant->created_at,
                "Asistencia" => $participant->presence ? "Si" : "No"
            ];
        }

        Excel::create('Campaña' . $campaign_id . date("Y-m-d"), function ($excel) use ($participants) {
            $excel->sheet('participantes', function ($sheet) use ($participants) {

                $sheet->fromArray($participants);

            });
        })->download('xls');
    }
}
