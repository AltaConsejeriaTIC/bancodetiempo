<?php

namespace App\Http\Controllers\Colegios;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\CampaignColegio;
use App\Models\CampaignParticipants;
use App\Models\ColegioUsuario;
use App\Models\Campaigns;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
        $this->middleware('adminColegios');
    }
    
    public function index(){
        
        $todas = Campaigns::where("state_id", 1)->paginate(12, ["*"], 'todas');
        $listEnabled = CampaignColegio::select("campaign_id")->where("colegio_id", Auth::user()->colegio()->id)->get();
        $enabled = Campaigns::where("state_id", 1)->whereIn("id", $listEnabled)->paginate(12, ["*"], 'enabled');
        $disabled = Campaigns::where("state_id", 1)->whereNotIn("id", $listEnabled)->paginate(12, ["*"], 'disabled');
        
        return view("colegios/admin/panel", compact("todas", "enabled", "disabled"));
    }
    
    public function addCampaignToSchool(Request $request){
        $this->validate($request, [
            "campaign_id" => "required|numeric"
        ]);
        
        CampaignColegio::create([
            "campaign_id" => $request->campaign_id,
            "colegio_id" => Auth::user()->colegio()->id
        ]);
        
        return redirect()->back()->with("msg", "Campaña habilitada con exito");
    }
    
    public function profile(){
        return redirect("/");
    }
    
    public function removeCampaignToSchool(Request $request){

        $students = ColegioUsuario::where("colegio_id", Auth::user()->colegio()->id)->get();

        foreach($students as $student){
            if(CampaignParticipants::where("campaigns_id", $request->campaign_id)->where("participant_id", $student->user_id)->get()->count() > 0){
                CampaignParticipants::where("campaigns_id", $request->campaign_id)->where("participant_id", $student->user_id)->delete();
                $campaign = Campaigns::find($request->campaign_id);
                $campaign->update([
                    'credits' => $campaign->credits-$campaign->hours
                ]);
            }


        }

        $campaignColegio = CampaignColegio::where("campaign_id", $request->campaign_id)->where("colegio_id", Auth::user()->colegio()->id)->delete();

        return redirect()->back()->with("msg", "Campaña deshabilitada con exito");
    }
}
