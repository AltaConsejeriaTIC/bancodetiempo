<?php

namespace App;


use Illuminate\Support\Facades\Auth;
use App\Models\Conversations;

class Helpers{
	
	static function getNotificationsUser(){
		
		$myServices = Auth::User()->services;

		$conversations = Conversations::whereIn("service_id", $myServices)->get();

		$notifications = 0;

		foreach ($conversations as  $key => $conversation) {

			$messages = json_decode($conversation->message);
			
			$lastMessage = $messages[count($messages)-1];

			if($lastMessage->state == 0){
				$notifications += 1;
			}
		}

		return $notifications;
		
	}
	
}

?>