<?php
namespace App;
use Illuminate\Support\Facades\Auth;
use App\Models\Conversations;
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
	
}
?>