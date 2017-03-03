<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\User;
class ReportsController extends Controller
{

    public function index($serviceId)
    {
        $service= Service::find($serviceId);
        $user = User::find(auth::user()->id);
        return view('',compact('service','user'));
    }

}
