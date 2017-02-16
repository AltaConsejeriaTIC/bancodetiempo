<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
	public function index(){
		
		$messages = Message::where('addressee', Auth::User()->id)->orderBy('created_at', "desc")->get();
		
		return view("inbox", compact("messages"));
		
	}
	
	static public function createMessage($conversation, $sender, $addressee, $message){
	
		Message::create([
				'conversation_id' => $conversation->id,
				'state' => 0,
				'sender' => $sender,
				'addressee' => $addressee,
				'message' => $message
		]);
		
	}
	
}
