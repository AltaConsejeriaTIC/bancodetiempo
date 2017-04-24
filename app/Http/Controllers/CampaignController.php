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
        $userDate = new \DateTime($request->input('dateCampaign'));
        $interval = $today->diff($userDate);
        $dayInterval = (int)ceil($interval->days / 2);
        $date_finish_donations = date('Y-m-d', strtotime("+$dayInterval day", strtotime(date("Y-m-d")))) . " " . $request->input('timeCampaign');

        if ($cover) {
            $group = Campaigns::create([
                'name' => $request->input('nameCampaign'),
                'description' => $request->input('descriptionCampaign'),
                'image' => $cover,
                'groups_id' => $request->input('group_id'),
                'hours' => $request->input('quotasCampaign'),
                'credits' => 0,
                'category_id' => $request->input('categoryCampaign'),
                'date_donations' => $date_finish_donations,
                'date' => $request->input('dateCampaign') . " " . $request->input('timeCampaign'),
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
            $participant = CampaignParticipants::create([
                'campaigns_id' => $request->input('campaign_id'),
                'participant_id' => Auth::id(),
            ]);

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

    public function sendReminder(){
        $yesterday = date("Y-m-d H-i-s", mktime(date("H"), date("i"), 0, date("m"), date("d")+1, date("Y")));
        $yesterday2 = date("Y-m-d H-i-s", mktime(date("H"), date("i"), 59, date("m"), date("d")+1, date("Y")));
        $range = array($yesterday, $yesterday2);
        $campaigns = Campaigns::whereBetween('date', $range)->get();
        foreach($campaigns as $campaign){
            foreach($campaign->participants as $participant){
                $email = $participant->participant->email2;

                Mail::send('mailReminder',['user' => $participant->participant, 'campaign' => $campaign], function ($message) use ($email){
                $message->from('evenvivelab_bog@unal.edu.co','Cambalachea!');
                $message->subject('Notificación');
                $message->to($email);
    	});
            }
        }
    }

}
