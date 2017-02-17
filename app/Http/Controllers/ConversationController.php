<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Conversations;

class ConversationController extends Controller
{
	public function index(){

		$myServices = Auth::User()->services;

		$conversations = Conversations::whereIn("service_id", $myServices)->get();


		foreach ($conversations as  $key => $conversation) {

			$messages = json_decode($conversation->message);

			$conversations[$key]["lastMessage"] = $messages[count($messages)-1]; 
		}

		return view("inbox", compact("conversations"));	

	}

	static public function newMessage($message,$conversation_id, $sender){

		$conversation = Conversations::find($conversation_id);

		$newMessage = json_decode($conversation->message);

		$newMessage[] = ["message" => $message, "date" => date("Y-m-d"), "time" => date("H:i:s"), "sender" => $sender, "state" => 0];

		$conversation->update([
			"message" => json_encode($newMessage)
		]);

	}

	public function saveMessage(Request $request){
		 ConversationController::newMessage($request->input('message'), $request->input('conversation'), Auth::User()->id);
	}

	public function showConversation($id_conversation){

		$conversation = Conversations::find($id_conversation);
		
		$messages = json_decode($conversation->message);
	
		$conversation["message"] = $messages; 

		return view('conversation', compact("conversation"));

	}

	public function messagesConversation($id_conversation){

		$conversation = Conversations::find($id_conversation);
		
		$messages = json_decode($conversation->message);
	
		$conversation["message"] = $messages; 

		return view('messages', compact("conversation"));

	}


}
