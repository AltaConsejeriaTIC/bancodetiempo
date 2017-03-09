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
        $userauth = User::find ( auth::user ()->id );
        $report = Reports::create([
            'service_id' => $serviceId,
            'user_id' => $userauth->id,
            'type_report_id' => $request->input('list'),
            'observation' =>$request->input('observacion')
        ]);
    }

}
