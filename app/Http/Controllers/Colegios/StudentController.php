<?php

namespace App\Http\Controllers\Colegios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\CampaignColegio;
use App\Models\Campaigns;
use Illuminate\Support\Facades\Auth;
use App\Models\CampaignParticipants;
use Maatwebsite\Excel\Facades\Excel;
use App\Helpers;
class StudentController extends Controller
{
    
    public function __construct(){
        
        $this->middleware("auth");
        
    }
    
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
        
        if(!is_null($request->file("avatar"))){
            $cover = Helpers::uploadImage($request->file('avatar'), 'user' . date("Ymd") . rand(000, 999), 'resources/user/user_' . Auth::id() . '/cover/');
            Auth::user()->update([
                "avatar" => $cover
            ]);
        }

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
    
    public function listStudents(Request $request){
        if(Auth::user()->role_id == 2){
            return redirect("/");
        }
        $students = User::where("plataforma", 2)->where("role_id", 2)->join("colegio_usuarios", "colegio_usuarios.user_id", "=", "users.id")->where("colegio_usuarios.colegio_id", Auth::user()->colegio()->id);
        
        if($request->has("documento") && $request->documento != ''){
            $students = $students->where("document", $request->documento);
        }
        if($request->has("nombre") && $request->nombre != ''){
            $students = $students->where("first_name", "like" ,"%".$request->nombre."%");
        }
        if($request->has("apellido") && $request->apellido != ''){
            $students = $students->where("last_name", "like" ,"%".$request->apellido."%");
        }
        if($request->has("curso") && $request->curso != ''){
            $students = $students->where("course", $request->curso);
        }
        if($request->has("email") && $request->email != ''){
            $students = $students->where("email", "like", "%".$request->email2."%");
        }
        //dd($students);
        
        if($request->download == 1){
            Excel::create('Litado estudiantes' . date("Y-m-d"), function ($excel) use ($students) {
                $excel->sheet('participantes', function ($sheet) use ($students) {
                    
                    $students->select("users.document as Documento", "users.first_name as Nombre", "users.last_name as Apellido", "users.course as curso", "users.email2 as Email", "users.gender as Genero", "users.aboutMe as Intereses", "users.credits as Horas_Completadas", "users.created_at as Fecha_Creacion");

                    $sheet->appendRow(array_keys($students->get()->last()->toArray()));
                    
                    foreach($students->get() as $student){
                        $sheet->appendRow($student->toArray());
                    }

                });
            })->download('xls');
        }
        
        $students = $students->select("users.*")->paginate("10");
        
        return view("colegios/admin/listStudents", compact("students"));
    }
}
