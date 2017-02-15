<?php

namespace App;


use Illuminate\Support\Facades\Auth;
use App\Models\Message;

class Helpers{
	
	static function getNotificationsUser(){
		
		$notifications = Message::select('sender, conversation_id')->where('addressee', Auth::user()->id)->where('state', 0)->groupBy('sender, conversation_id')->get();
		
		return count($notifications);
		
	}
	
}

?>