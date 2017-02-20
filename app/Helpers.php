<?php

namespace App;


use Illuminate\Support\Facades\Auth;
use App\Models\Conversations;

class Helpers{
	
	static function getNotificationsUser(){
		
		$myServices = Auth::User()->services;

		$conversationsMyService = Conversations::whereIn("service_id", $myServices)->get();

		$conversations = Conversations::where("applicant_id", Auth::user()->id)->get();

		$notifications = 0;

		foreach ($conversationsMyService as  $key => $conversation) {

			$messages = json_decode($conversation->message);
			
			$lastMessage = $messages[count($messages)-1];

			if($lastMessage->state == 0 && $lastMessage->sender != Auth::User()->id){
				$notifications += 1;
			}
		}

		foreach ($conversations as  $key => $conversation) {

			$messages = json_decode($conversation->message);
			
			$lastMessage = $messages[count($messages)-1];

			if($lastMessage->state == 0 && $lastMessage->sender != Auth::User()->id){
				$notifications += 1;
			}
		}

		return $notifications;
		
	}
	
}

?>