<?php

namespace App\Http\Controllers\Colegios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\CampaignColegio;
use App\Models\Campaigns;
use Illuminate\Support\Facades\Auth;
use App\Models\CampaignParticipants;
class StudentController extends Controller
{
    public function index(){
        
        $listEnabled =  CampaignColegio::select("campaign_id")->where("colegio_id", Auth::user()->colegio()->id)->get();
        $campaigns = Campaigns::where("state_id", 1)->whereIn("id", $listEnabled)->paginate(12, ["*"], 'todas');
        
        return view("colegios/estudiante/panel", compact("campaigns"));
    }
    
    public function profile(){
        return view("colegios/estudiante/perfil");
    }
    
    public function edit(Request $request){
        $this->validate($request, [
            "name" => "required",
            "last_name" => "required",
            "email" => "required",
            "document" => "required",
            "aboutMe" => "required",
            "date" => "required",
            "course" => "required",
        ]);
        
        Auth::user()->update([
            "first_name" => $request->name,
            "last_name" => $request->last_name,
            "email2" => $request->email,
            "document" => $request->document,
            "aboutMe" => $request->aboutMe,
            "birthDate" => $request->date,
            "course" => $request->course,
        ]);
        
        return redirect()->back();
    }
    
    public function inscriptionCampaign(Request $request){
        
        CampaignParticipants::create([
            'campaigns_id' => $request->campaign_id,
            'participant_id' => Auth::id(),
            "confirmed" => true
        ]);
        
        $campaign = Campaigns::find($request->campaign_id);
        
        $campaign->update([
            'credits' => $campaign->credits+$campaign->hours
        ]);
        
        return redirect()->back();
    }
    
    public function unregistrationCampaign(Request $request){
        CampaignParticipants::where("campaigns_id", $request->campaign_id)->where("participant_id", Auth::id())->delete();
        $campaign = Campaigns::find($request->campaign_id);
        
        $campaign->update([
            'credits' => $campaign->credits-$campaign->hours
        ]);
        
        return redirect()->back();
    }
    
    public function compromises(){
        
        $listCampaigns = CampaignParticipants::select("campaigns_id")->where("participant_id", Auth::id())->get();
        $campaigns = Campaigns::whereIn("id", $listCampaigns)->where("state_id", 1)->orderBy("date", "asc")->get();
        
        return view("colegios/estudiante/compromisos", compact("campaigns"));
    }
}
