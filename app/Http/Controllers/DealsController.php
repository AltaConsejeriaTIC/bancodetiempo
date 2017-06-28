<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Deal;
use App\Models\DealState;
use App\Models\UserScore;
use App\Models\Service;
use App\Models\ServiceScore;
use Maatwebsite\Excel\Facades\Excel;

class DealsController extends Controller
{
    private $request;

    public function saveObservation(Request $request){

        $this->request = $request;

        if($this->request->input("scoreFrom") == "offerer"){
            $this->saveObservationOfferer();
        }elseif($request->input("scoreFrom") == "applicant"){
            $this->saveObservationApplicant();
        }
        $this->exchange($this->request->input("deal_id"));
        $deal = Deal::find($request->input("deal_id"));

        if(!is_null($deal->response_applicant) && !is_null($deal->response_offerer)){
            $this->createNewState($this->request->input("deal_id"), 10);
        }
        return redirect()->back()->with('response', true);

    }

    public function saveObservationOfferer(){
        UserScore::create([
           "user_evaluator_id" => Auth::User()->id,
            "user_id" => $this->request->input("applicant_id"),
            "score" => $this->request->input("score", 0),
            "observation" => $this->request->input("observation")
        ]);

        User::setRanking($this->request->input("applicant_id"));

        Deal::find($this->request->input("deal_id"))->update([
            "response_offerer" => $this->request->input("response"),
            "offerer_badObservations_id" => $this->request->input("badObservation", 1),
            "offerer_observation" => $this->request->input("observation")
        ]);
    }

    public function saveObservationApplicant(){
        if($this->request->input("response") == 1){
            UserScore::create([
                "user_evaluator_id" => Auth::User()->id,
                "user_id" => $this->request->input("offerer_id"),
                "score" => $this->request->input("score", 0),
                "observation" => $this->request->input("observation")
            ]);
        }

        User::setRanking($this->request->input("offerer_id"));

        ServiceScore::create([
            "service_id" => $this->request->input("service_id"),
            "user_id" => Auth::User()->id,
            "score" => $this->request->input("score", 0),
            "observation" => $this->request->input("observation"),
            "badObservations_id" => $this->request->input("badObservation", 1),
        ]);

        Service::setRanking($this->request->input("service_id"));

        Deal::find($this->request->input("deal_id"))->update([
            "response_applicant" => $this->request->input("response"),
            "applicant_badObservations_id" => $this->request->input("badObservation", 1),
            "applicant_observation" => $this->request->input("observation")
        ]);

    }

    public function createNewState($deal_id, $state){

        DealState::create([
            "deal_id" => $deal_id,
            "state_id" => $state
        ]);

    }

    public function makeExchange($applicant, $offerer, $creditsApplicant, $creditsOfferer){
        $applicant->update([
                "credits" => $creditsApplicant
        ]);

        $offerer->update([
                "credits" => $creditsOfferer
        ]);
    }

    public function exchange($deal_id){

        $deal = Deal::find($deal_id);

        $applicant = User::find($deal->user_id);

        $offerer = User::find($deal->service->user_id);

        if($deal->response_applicant === 1 && $deal->response_offerer === 1){
            $this->makeExchange($applicant, $offerer, $applicant->credits-$deal->value, $offerer->credits+$deal->value);
        }

        if($deal->response_applicant === 1 && $deal->response_offerer === 0){
            $this->makeExchange($applicant, $offerer, $applicant->credits-$deal->value, $offerer->credits+$deal->value);
        }

        if($deal->response_applicant === 0 && $deal->response_offerer === 0){

            if($deal->applicant_badObservations_id == 3 && $deal->offerer_badObservations_id == 2){
                $this->makeExchange($applicant, $offerer, $applicant->credits-$deal->value, $offerer->credits+$deal->value);
            }

        }

    }

    public function exchangeForTime(){
        $date = new \DateTime(date('Y').'-'.date('m').'-'.(date('d')-3));
        $deals = Deal::where('date', '<=', $date->format('Y-m-d'))->where('time', '<=', date("H:i:s"))->get();
        foreach($deals as $deal){
            if($deal->dealStates->last()->state_id == 12){
                $this->createNewState($deal->id, 10);
                 if($deal->response_applicant == null && $deal->response_offerer == null){
                     $this->makeExchange($deal->user, $deal->service->user, $deal->user->credits-$deal->value, $deal->service->user->credits+$deal->value);
                 }
                if($deal->response_applicant == 1 && $deal->response_offerer == null){
                     $this->makeExchange($deal->user, $deal->service->user, $deal->user->credits-$deal->value, $deal->service->user->credits+$deal->value);
                 }
                if($deal->response_applicant == null && $deal->response_offerer == 1){
                     $this->makeExchange($deal->user, $deal->service->user, $deal->user->credits-$deal->value, $deal->service->user->credits+$deal->value);
                 }
            }
        }
    }

}
