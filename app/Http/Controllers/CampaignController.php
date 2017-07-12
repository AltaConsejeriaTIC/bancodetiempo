<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Groups;
use App\Models\Campaigns;
use App\Models\CampaignParticipants;
use App\Helpers;
use Mail;

class CampaignController extends Controller
{
    public function create(Request $request)
    {

        $cover = Helpers::uploadImage($request->file('imageCampaign'), 'campaign' . date("Ymd") . rand(000, 999), 'resources/user/user_' . Auth::User()->id . '/campaigns/');
        $today = new \DateTime(date("Y-m-d"));
        $userDate = new \DateTime($request->input('dateCampaign')." ".$request->input('timeCampaign'));
        $interval = $today->diff($userDate);
        $dayInterval = (int)ceil($interval->days / 2);
        $date_finish_donations = date('Y-m-d', strtotime("+$dayInterval day", strtotime(date("Y-m-d")))) . " " . $request->input('hoursCampaign');
        if ($cover) {
            $group = Campaigns::create([
                'name' => $request->input('nameCampaign'),
                'description' => $request->input('descriptionCampaign'),
                'image' => $cover,
                'user_id' => Auth::id(),
                'hours' => $request->input('hoursCampaign'),
                'credits' => 0,
                'category_id' => $request->input('categoryCampaign'),
                'date_donations' => $date_finish_donations,
                'date' => $userDate,
                'state_id' => 1
            ]);
        }

        return redirect()->back();

    }

    public function show($campaignId)
    {

        $campaign = Campaigns::findOrFail($campaignId);

        return view('campaigns/campaign', compact('campaign'));
    }

    public function inscriptionParticipant(Request $request)
    {

        if ($this->getQuotasAvailable($request->input('campaign_id')) > 0) {

            $participant = CampaignParticipants::where("participant_id", Auth::id())->where("campaigns_id", $request->input('campaign_id'));
            if ($participant->get()->count() == 0) {
                $participant = CampaignParticipants::create([
                    'campaigns_id' => $request->input('campaign_id'),
                    'participant_id' => Auth::id(),
                    "confirmed" => 1
                ]);
            } else {
                $participant->update([
                    "confirmed" => true
                ]);
            }

            return redirect()->back()->with('msg', 'Te has inscrito con exito');
        }

        return redirect()->back()->with('msg', 'Ya no quedan cupos disponibles');

    }

    public function preinscriptionParticipant(Request $request)
    {
        $participant = CampaignParticipants::create([
            'campaigns_id' => $request->input('campaign_id'),
            'participant_id' => Auth::id(),
            'confirmed' => true
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
        $totalParticipants = $campaign->participants->count();
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

    public function update(Request $request)
    {

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
        $campaigns = Campaigns::whereBetween("date", [date("Y-m-d H:i:00"), date("Y-m-d H:i:59")])->where("state_id", 1)->get();
        print(date("Y-m-d H:i:00"));
        foreach ($campaigns as $campaign) {
            $campaign->update([
                "state_id" => 12
            ]);
        }
    }

    public function enableInscriptions()
    {

        $campaigns = Campaigns::whereBetween("date_donations", [date("Y-m-d H:i:00"), date("Y-m-d H:i:59")])->where('allows_registration', 0)->get();

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
            print($mail . "\n");
            Mail::send('mailPreInscribed', ["campaign" => $campaign, "participant" => $participant->participant], function ($message) use ($mail) {
                $message->from('bancodetiempo@cambalachea.co', 'Cambalachea!');
                $message->subject('Notificación');
                $message->to($mail);
            });
        }


    }

    public function filter(Request $request)
    {
        $filter = $request->input('filter');
        $campaigns = Campaigns::select("campaigns.*")->where('campaigns.name', 'LIKE', "%$filter%")->where('campaigns.state_id', 1)->join("groups", "groups.id", "campaigns.groups_id")->where("groups.state_id", 1)->paginate(12);
        return view('campaigns/list', compact('campaigns', 'filter'));
    }

    public function showListAllCampaigns(Request $request){

        $campaigns = Campaigns::getCampaignsActive()->paginate(4);

        return view('campaigns.list', compact('campaigns'));

    }

}
