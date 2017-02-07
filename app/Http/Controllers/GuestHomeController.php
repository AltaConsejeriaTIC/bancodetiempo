<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use App\User;

class GuestHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $tags = Tag::select('tags.*','tags_services.service_id')
                ->join('tags_services','tags.id','=','tags_services.tag_id')
                ->join('services','tags_services.service_id','=','services.id')                
                ->where('state_id' , 1)
                ->get();

    	$allServices = Service::paginate(12);
        return view('guest', compact('allServices','tags'));
    }




}
