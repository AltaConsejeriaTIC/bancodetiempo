<?php

namespace App;


use Illuminate\Support\Facades\Auth;
use App\Models\Message;

class Helpers{
	
	static function getNotificationsUser(){
		$notifications = Message::select('sender')->where('addressee', Auth::user()->id)->where('state', 0)->groupBy('sender')->get();
		
		return count($notifications);
		
	}
	
}

?>