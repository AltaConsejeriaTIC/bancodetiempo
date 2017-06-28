<?php
namespace App;
use Illuminate\Support\Facades\Auth;
use App\Models\Conversations;
use Illuminate\Http\Request;
class Helpers{
	
	static function getNotificationsUser(){
		
		$myServices = Auth::User()->services;
        $listServices = [];
        foreach($myServices as $services){
            $listServices[] = $services->id;
        }
		$conversationsMyService = Conversations::whereIn("service_id", $listServices)->get();
		$conversations = Conversations::where("applicant_id", Auth::user()->id)->get();
		$notifications = 0;
		foreach ($conversationsMyService as  $key => $conversation) {
			$messages = json_decode($conversation->message);
			
			$lastMessage = $messages[count($messages)-1];
			if($lastMessage->state == 6 && $lastMessage->sender != Auth::User()->id){
				$notifications += 1;
			}
		}
		foreach ($conversations as  $key => $conversation) {
			$messages = json_decode($conversation->message);
            $lastMessage =  $messages[count($messages)-1];
            if($lastMessage->state == 6 && $lastMessage->sender != Auth::User()->id){
                $notifications += 1;
            }
		}
		return $notifications;
		
	}

    static function uploadImage($file, $name = '', $directory = 'resources/'){

        if(!$file){
          return false;
        }
        $imageName = $name == '' ? date("Ymd").rand(000,999) : $name;

        $file->move ( base_path () . '/public/' . $directory, $imageName. '.' .$file->getClientOriginalExtension() );

		return $directory . $imageName . '.' . $file->getClientOriginalExtension();
    }
	
    static function getStepsUser(){
        $pass1 = Auth::user()->privacy_policy == 1 ? 1 : 0;
        $pass2 = Auth::user()->interests->count() >= 1 ? 1 : 0;
        $pass3 = Auth::user()->services->count() >= 1 ? 1 : 0;
        session(['pass1' => $pass1]);
        session(['pass2' => $pass2]);
        session(['pass3' => $pass3]);
    }

    static function getLastStep(){

        if(session('pass1') == 0){
            return 'Pass1';
        }
        if(session('pass2') == 0){
            return 'Pass2';
        }
        if(session('pass3') == 0){
            return 'Pass3';
        }

    }

    static function getRedirectLastStep(){
        Helpers::getStepsUser();
        $lastStep = Helpers::getLastStep();
        return  'redirect'.$lastStep;

    }

    static function intervalDate($date1, $date2 = 0){

        if($date2 == 0){
            $date2 = \date("Y-m-d");
        }

        $datetime1 = new \DateTime($date1);
        $datetime2 = new \DateTime($date2);
        $interval = $datetime1->diff($datetime2);
        return $interval->format('%a');

    }


}
?>
