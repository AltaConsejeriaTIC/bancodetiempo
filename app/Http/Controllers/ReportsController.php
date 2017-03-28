<?php

namespace App\Http\Controllers;

use App\Models\TypeReport;
use App\Models\Reports;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\User;
class ReportsController extends Controller
{

    public function create(Request $request, $serviceId)
    {
        $user_report=(Reports:: where([['user_id', '=', auth::user()->id],['service_id', '=', $serviceId],])->get());
        if (count($user_report)==0){
            $report = Reports::create([
                'service_id' => $serviceId,
                'user_id' => auth::user()->id,
                'type_report_id' => $request->input('list'),
                'observation' => $request->input('observacion')
            ]);
            return redirect()->back()->with('report', true);

        }

            return redirect()->back()->with('reportOk', true);

    }

}
