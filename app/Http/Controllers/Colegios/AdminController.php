<?php

namespace App\Http\Controllers\Colegios;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Campaigns;
use App\Models\Colegio;
use App\Models\ColegioUsuario;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('adminColegios');
    }
    
    public function index(){
        
        $todas = Campaigns::where("state_id", 1)->paginate(12, ["*"], 'todas');
        
        
        return view("colegios/admin/panel", compact("todas"));
    }
}
