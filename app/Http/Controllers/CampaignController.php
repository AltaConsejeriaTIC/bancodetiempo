<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Groups;
use App\Models\Campaigns;
use App\Models\CampaignParticipants;
use App\Models\TypeReport;
use App\Models\CampaignReport;
use App\Helpers;
use Mail;
use App\Http\Controllers\Admin\CampaignsController as adminCampaign;

class CampaignController extends Controller
{
    public function show($campaignId){
        $campaign = Campaigns::findOrFail($campaignId);
        if($campaign->state_id == 3){
            return redirect("/");
        }
        $listTypes = TypeReport::pluck('type', 'id');
        return view('campaigns/campaign', compact('campaign', 'listTypes'));
    }
    public function create(Request $request){
        $cover = Helpers::uploadImage($request->file('imageCampaign'), 'campaign' . date("Ymd") . rand(000, 999), 'resources/user/user_' . Auth::User()->id . '/campaigns/');
        $date_finish_donations = $this->getDateDonations($request->input('dateCampaign'), $request->input('timeCampaign'),$request->input('hoursCampaign'));
        if ($cover) {
            Campaigns::create([
                'name' => $request->input('nameCampaign'),
                'description' => $request->input('descriptionCampaign'),
                'image' => $cover,
                'user_id' => Auth::id(),
                'hours' => $request->input('hoursCampaign'),
                'credits' => 0,
                'category_id' => $request->input('categoryCampaign'),
                'date_donations' => $date_finish_donations,
                'date' => $request->input('dateCampaign')." ".$request->input('timeCampaign'),
                'state_id' => 1
            ]);
        }
        return redirect()->back();
    }
    private function getDateDonations($date, $time, $hours){
        $current = \date("Y-m-d H:i:s");
        $today = new \DateTime($current);
        $userDate = new \DateTime($date . " " . $time);
        $interval = $today->diff($userDate);
        $dayInterval = (int)ceil($interval->days / 2);
        $hoursInterval = (int)ceil($interval->h / 2);
        $day = strtotime("+$hoursInterval hour", strtotime($current));
        $day = strtotime("+$dayInterval hour", $day);
        $day = \date("Y-m-d H:i:s", $day);
        return $day;
    }
    public function report(Request $request, $campaignId){
        $user_report = CampaignReport::where('user_id', auth::user()->id)->where('campaign_id', $campaignId)->get();
        if (count($user_report)==0) {
            CampaignReport::create([
                'campaign_id' => $campaignId,
                'user_id' => auth::id(),
                'type_report_id' => $request->input('list'),
                'observation' => $request->input('observacion')
            ]);
            $this->blockCampaign($campaignId);
            return redirect()->back()->with('report', true);
        }
        return redirect()->back()->with('reportOk', true);
    }
    private function blockCampaign($campaignId){
        if (CampaignReport::where('campaign_id', $campaignId)->get()->count() > 4){
            $campaign = Campaigns::find($campaignId);
            $campaign->update([
                'state_id' => 3,
            ]);
            adminCampaign::sendEmailToCampaignStakeholders($campaign);
            adminCampaign::removeParticipantsCampaignBlock($campaign);
        }   
    }
    public function inscriptionParticipant(Request $request){
        if ($this->inscribePerson($request->input('campaign_id'), Auth::id())) {
            return redirect()->back()->with('msg', 'Te has inscrito con exito');
        }

        return redirect()->back()->with('msg', 'Ya no quedan cupos disponibles');
    }

    public function preinscriptionParticipant(Request $request)
    {
        $participant = CampaignParticipants::create([
            'campaigns_id' => $request->input('campaign_id'),
            'participant_id' => Auth::id(),
            'confirmed' => false
        ]);

        return redirect()->back()->with('msg', 'Te has preinscrito con exito');
    }

    public function cancelPreinscriptionParticipant(Request $request)
    {
        $campaignId = $request->input('campaign_id');
        $userId = Auth::user()->id;

        CampaignParticipants::where('campaigns_id', $campaignId)->where('participant_id', $userId)->delete();

        return redirect()->back();
    }

    private function getQuotasCampaign($campaign)
    {
        $quotas = $campaign->credits / $campaign->hours;
        return (int)floor($quotas);
    }

    private function getQuotasAvailable($campaign_id)
    {
        $campaign = Campaigns::find($campaign_id);
        $totalParticipants = $campaign->participants->where('confirmed', true)->count();
        return $this->getQuotasCampaign($campaign) - $totalParticipants;
    }

    public function sendReminder()
    {
        $yesterday = date("Y-m-d H-i-s", mktime(date("H"), date("i"), 0, date("m"), date("d") + 1, date("Y")));
        $yesterday2 = date("Y-m-d H-i-s", mktime(date("H"), date("i"), 59, date("m"), date("d") + 1, date("Y")));
        $range = array($yesterday, $yesterday2);
        $campaigns = Campaigns::whereBetween('date', $range)->get();
        foreach ($campaigns as $campaign) {
            foreach ($campaign->participants as $participant) {
                $email = $participant->participant->email2;

                Mail::send('mailReminder', ['user' => $participant->participant, 'campaign' => $campaign], function ($message) use ($email) {
                    $message->from('evenvivelab_bog@unal.edu.co', 'Cambalachea!');
                    $message->subject('Notificación');
                    $message->to($email);
                });
            }
        }
    }

    public function update(Request $request){
        $today = new \DateTime(date("Y-m-d"));
        $userDate = new \DateTime($request->input('dateCampaign'));
        $interval = $today->diff($userDate);
        $dayInterval = (int)ceil($interval->days / 2);
        $date_finish_donations = date('Y-m-d', strtotime("+$dayInterval day", strtotime(date("Y-m-d")))) . " " . $request->input('timeCampaign');

        $uploadedImage = Helpers::uploadImage($request->file('imageCampaign'), 'campaign' . date("Ymd") . rand(000, 999), 'resources/user/user_' . Auth::User()->id . '/services/');
        if (!$uploadedImage) {
            $uploadedImage = "";
        }

        $campaign = Campaigns::find($request->input("campaign_id"))->update([
            'name' => $request->input('nameCampaign'),
            'description' => $request->input('descriptionCampaign'),
            'date' => $request->input('dateCampaign') . " " . $request->input('timeCampaign'),
            'hours' => $request->input('hoursCampaign'),
            'category_id' => $request->input('categoryCampaign'),
            'date_donations' => $date_finish_donations,
            'image' => $uploadedImage,
            'state_id' => 1
        ]);
        return redirect()->back();
    }

    public function delete($campaignId)
    {
        $campaign = Campaigns::find($campaignId)->update([
            'state_id' => 2
        ]);

        return redirect()->back();
    }

    public function pay(Request $request)
    {
        $campaign = Campaigns::find($request->input('campaign_id'));
        $participants = $request->input('participantsPay');

        foreach ($participants as $participant) {
            $thisParticipant = $campaign->participants->where('participant_id', $participant);
            if ($thisParticipant->count() > 0) {

                $thisParticipant->last()->update([
                    "presence" => 1
                ]);

                $thisParticipant->last()->participant->update([
                    "credits" => $thisParticipant->last()->participant->credits + $campaign->hours
                ]);

                $campaign->update([
                    "credits" => $campaign->credits - $campaign->hours
                ]);
            }
        }

        $campaign->update([
            "credits" => 0,
            "state_id" => 10
        ]);

        return redirect()->back();

    }

    public function changeState()
    {
        $campaigns = Campaigns::where("date", "<=" ,date("Y-m-d H:i:59"))->where('allows_registration', 1)->where("state_id", 1)->get();
        foreach ($campaigns as $campaign) {
            $campaign->update([
                "state_id" => 12
            ]);
        }
    }

    public function enableInscriptions(){
        $campaigns = Campaigns::where("date_donations", "<=" ,date("Y-m-d H:i:59"))->where('allows_registration', 0)->where("state_id", 1)->get();
        foreach ($campaigns as $campaign) {
            $campaign->update([
                "credits" => $campaign->credits * 2,
                "allows_registration" => 1
            ]);
            $this->SendEmailToPreInscribed($campaign);
        }
    }

    private function SendEmailToPreInscribed($campaign)
    {
        foreach ($campaign->participants as $participant) {
            $mail = $participant->participant->email2;

            if ($this->inscribePerson($campaign->id, $participant->participant->id)) {
                $this->sendEmail('mailPreInscribed', ["campaign" => $campaign, "participant" => $participant->participant], $mail);
            } else {
                $this->sendEmail('mailNoPreInscribed', ["campaign" => $campaign, "participant" => $participant->participant], $mail);
            }
        }
    }

    private function sendEmail($templateId, $emailParams, $toEmail)
    {
        Mail::send($templateId, $emailParams, function ($message) use ($toEmail) {
            $message->from('bancodetiempo@cambalachea.co', 'Cambalachea!');
            $message->subject('Notificación');
            $message->to($toEmail);
        });
    }

    private function inscribePerson($campaignId, $personId)
    {
        $quotas = $this->getQuotasAvailable($campaignId);
        $areThereQuotas = $quotas > 0;

        if ($areThereQuotas) {
            $participant = CampaignParticipants::where("participant_id", $personId)->where("campaigns_id", $campaignId);

            if ($participant->get()->count() == 0) {
                CampaignParticipants::create([
                    'campaigns_id' => $campaignId,
                    'participant_id' => $personId,
                    "confirmed" => true
                ]);
            } else {
                $participant->update([
                    "confirmed" => true
                ]);
            }
        }

        return $areThereQuotas;
    }

    public function filter(Request $request){
        $filter = $request->input('filter');
        $campaigns = Campaigns::select("campaigns.*")->where('campaigns.name', 'LIKE', "%$filter%")->where('campaigns.state_id', 1)->join("groups", "groups.id", "campaigns.groups_id")->where("groups.state_id", 1)->paginate(12);
        return view('campaigns/list', compact('campaigns', 'filter'));
    }

    public function showListAllCampaigns(Request $request){
        $campaigns = Campaigns::getCampaignsActive()->paginate(4);
        return view('campaigns.list', compact('campaigns'));
    }

}
