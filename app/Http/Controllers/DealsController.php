<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Conversations;
use App\Models\Deal;
use App\Models\DealState;
use App\Models\UserScore;
use App\Models\Service;
use App\Models\ServiceScore;
use Maatwebsite\Excel\Facades\Excel;

class DealsController extends Controller
{
    private $request;
    private $conversation;
    private $deal;

    public function createDeal(Request $request)
	{
        $conversation = Conversations::find($request->conversation);
        $dealsConversation = Deal::where('conversations_id', $conversation->id)->whereIn('state_id', [4, 7, 12])->get();
        $dataTime = explode(" ",$request->date);
        if($dealsConversation->count() == 0){
            Deal::create([
                'user_id' => $conversation->applicant_id,
                'service_id' => $conversation->service_id,
                'date' => $dataTime[0],
                'time' => $dataTime[1],
                'location' => $request->place,
                'value' => $request->credits,
                'description' => $request->observations,
                'coordinates' => $request->coordinates,
                'conversations_id' => $conversation->id,
                'state_id' => 4,
                'creator_id' => Auth::id()
            ]);

            $email = new EmailController;
            if($conversation->applicant_id == Auth::id()){
                $email->sendMailDeal($conversation->service->user_id,$conversation->applicant_id, $conversation->service, "new");
            }else{
                $email->sendMailDeal($conversation->applicant_id,$conversation->service->user_id, $conversation->service, "new");
            }
            
            return '{"state" : "ok"}';

        }
		return '{"state" : "error"}';
	}
    
    public function cancelDeal(Request $request){
        $deal = Deal::where('conversations_id', $request->conversation)->whereIn('state_id', [4, 7])->get()->last();
        $deal->update([
            'state_id' => 8
        ]);
        return '{"state" : "ok"}';
    }
    
    public function aceptDeal(Request $request){
        $conversation = Conversations::find($request->conversation);
        $deal = Deal::where('conversations_id', $request->conversation)->where('state_id', 4)->get()->last();
        $deal->update([
            'state_id' => 7
        ]);
        if($deal->creator_id != Auth::id()){
            $email = new EmailController;
           if($conversation->applicant_id == $deal->creator_id){
                $email->sendMailDeal($conversation->applicant_id,$conversation->service->user_id, $conversation->service, "acepted");
            }else{
                $email->sendMailDeal($conversation->service->user_id,$conversation->applicant_id, $conversation->service, "acepted");
            }
        }
        return '{"state" : "ok"}';
    }

    public function saveObservation(Request $request){
        $this->request = $request;
        $this->conversation = Conversations::find($request->conversation);
        $this->deal = Deal::where('conversations_id', $request->conversation)->whereIn('state_id', [12])->get()->last();
        if($this->conversation->applicant_id == Auth::id()){
            $this->saveObservationApplicant();
        }else{
            $this->saveObservationOfferer();
        }
        
        if(!is_null($this->deal->response_applicant) && !is_null($this->deal->response_offerer)){
            $this->exchange();
            $this->deal->update([
                "state_id" => 10
            ]);
        }
        return redirect()->back()->with('response', true);
    }

    public function saveObservationOfferer(){
        UserScore::create([
           "user_evaluator_id" => Auth::User()->id,
            "user_id" => $this->conversation->applicant_id,
            "score" => $this->request->input("score", 0),
            "observation" => $this->request->input("observation")
        ]);

        User::setRanking($this->conversation->applicant_id);

        $this->deal->update([
            "response_offerer" => $this->request->input("badObservation", 1) == 1 ? 1 : 0,
            "offerer_badObservations_id" => $this->request->input("badObservation", 1),
            "offerer_observation" => $this->request->input("observation")
        ]);
    }

    public function saveObservationApplicant(){
        if($this->request->input("badObservation", 1) == 1){
            UserScore::create([
                "user_evaluator_id" => Auth::User()->id,
                "user_id" => $this->conversation->service->user_id,
                "score" => $this->request->input("score", 0),
                "observation" => $this->request->input("observation")
            ]);
        }

        User::setRanking($this->conversation->service->user_id);

        ServiceScore::create([
            "service_id" => $this->conversation->service_id,
            "user_id" => Auth::User()->id,
            "score" => $this->request->input("score", 0),
            "observation" => $this->request->input("observation"),
            "badObservations_id" => $this->request->input("badObservation", 1),
        ]);

        Service::setRanking($this->conversation->service_id);

        $this->deal->update([
            "response_applicant" => $this->request->input("badObservation", 1) == 1 ? 1 : 0,
            "applicant_badObservations_id" => $this->request->input("badObservation", 1),
            "applicant_observation" => $this->request->input("observation")
        ]);

    }    

    public function exchange(){        
        $applicant = User::find($this->deal->user_id);
        $offerer = User::find($this->deal->service->user_id);
        if($this->deal->response_applicant === 1 && $this->deal->response_offerer === 1){
            $this->makeExchange($applicant, $offerer, $applicant->credits-$this->deal->value, $offerer->credits+$this->deal->value);
        }
        if($this->deal->response_applicant === 1 && $this->deal->response_offerer === 0){
            $this->makeExchange($applicant, $offerer, $applicant->credits-$deal->value, $offerer->credits+$this->deal->value);
        }
        if($this->deal->response_applicant === 0 && $this->deal->response_offerer === 0){
            if($this->deal->applicant_badObservations_id == 3 && $this->deal->offerer_badObservations_id == 2){
                $this->makeExchange($applicant, $offerer, $applicant->credits-$this->deal->value, $offerer->credits+$this->deal->value);
            }
        }
    }
    
    public function makeExchange($applicant, $offerer, $creditsApplicant, $creditsOfferer){
        
        $applicant->update([
            "credits" => $creditsApplicant
        ]);

        $offerer->update([
            "credits" => $creditsOfferer
        ]);
    }

    public function exchangeForTime(){
        $date = new \DateTime(date('Y').'-'.date('m').'-'.(date('d')-3));
        $deals = Deal::where('date', '<=', $date->format('Y-m-d'))->where('time', '<=', date("H:i:s"))->where("state_id", 12)->get();
        foreach($deals as $deal){
            if($deal->response_applicant == null && $deal->response_offerer == null){
                 $this->makeExchange($deal->user, $deal->service->user, $deal->user->credits-$deal->value, $deal->service->user->credits+$deal->value);
             }
            if($deal->response_applicant == 1 && $deal->response_offerer == null){
                 $this->makeExchange($deal->user, $deal->service->user, $deal->user->credits-$deal->value, $deal->service->user->credits+$deal->value);
             }
            if($deal->response_applicant == null && $deal->response_offerer == 1){
                 $this->makeExchange($deal->user, $deal->service->user, $deal->user->credits-$deal->value, $deal->service->user->credits+$deal->value);
             }
            $deal->update([
                "state_id" => 10
            ]);            
        }
    }    
    
    public function refuseDeal(){
        $date = new \DateTime(date('Y-m').'-'.(date('d')-3)." ".date("H:i:s"));
        $deals = Deal::where('created_at', '<=', $date->format('Y-m-d H:i:s'))->whereRaw("date <= ".date("Y-m-d")." AND time <= ".date("H:i:s"))->where("state_id", 4)->get();
        foreach($deals as $deal){
            $deal->update([
                "state_id" => 8
            ]);            
        }
    }  
    
    public function changeDealsForRanking(){
        
        $deals = Deal::where("date", "<=", \date("Y-m-d"))->where("time", "<=", \date('H:i:s'))->where("state_id", 7)->get();
        if($deals->count() > 0){
            foreach($deals as $deal){
                $deal->update([
                    "state_id" => 12
                ]);
                $email = new EmailController;
                $email->sendMailDeal($deal->user_id,$deal->service->user_id, $deal->service, "ranking");
                $email->sendMailDeal($deal->service->user_id,$deal->user_id, $deal->service, "ranking");                
            }
        }
        
    }

}
