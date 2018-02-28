<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HistoryDonations;
use Maatwebsite\Excel\Facades\Excel;

class DonationsController extends Controller
{
    public function historyDonations(Request $request)
    {

        $history = HistoryDonations::select("history_donations.*")->orderBy('updated_at', 'desc');

        if ($request->donor != '') {
            $history->join('users', 'users.id', 'history_donations.donor_id')->whereRaw("(users.first_name LIKE '%$request->donor%' OR users.last_name LIKE '%$request->donor%')");
        }

        if ($request->campaign != '') {
            $history->join('campaigns', 'campaigns.id', 'history_donations.campaign_id')->where("campaigns.name", 'LIKE', "%$request->campaign%");
        }
        if ($request->credits != '') {
            $history->where("credits", $request->credits);
        }

        if($request->fecha != ''){
            $fecha = explode("|", $request->fecha);
            $history->whereBetween("history_donations.created_at", $fecha);
        }

        if($request->download != ""){
            $this->exportExcel($history->get());
        }

        $history = $history->paginate(12);

        return view("admin/history/donations", compact('history'));

    }

    private function exportExcel($history){

        $data = [];

        foreach($history as $row){

            $header = [
                        'Donador',
                        'Campaña',
                        'Dorados',
                        'Fecha'
                      ];
            $data[] = [
                'Donador' => $row->donor->first_name." ".$row->donor->last_name,
                'campaña' => $row->campaign->name,
                "Dorados" => $row->credits,
                "Fecha" => $row->created_at
            ];

        }

        Excel::create('DonacionesCambalachea' ." ". date("Y-m-d"), function ($excel) use ($data, $header) {
            $excel->sheet('Donaciones', function ($sheet) use ($data, $header) {

                $sheet->fromArray($data);
                $sheet->row(1, $header);

            });
        })->download('xls');

    }
}
