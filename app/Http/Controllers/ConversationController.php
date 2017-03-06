<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Conversations;
use App\Models\Deal;
use App\Models\DealState;
use App\Http\Controllers\EmailController;

class ConversationController extends Controller
{
	public function index(){

		$myServices = Auth::User()->services;

		$conversationsMyService = Conversations::whereIn("service_id", $myServices)->get();

		$conversations = Conversations::where("applicant_id", Auth::user()->id)->get();

		foreach ($conversationsMyService as  $key => $conversation) {

			$messages = json_decode($conversation->message);

			$conversationsMyService[$key]["lastMessage"] = $messages[count($messages)-1];
		}

		foreach ($conversations as  $key => $conversation) {

			$messages = json_decode($conversation->message);

			$conversations[$key]["lastMessage"] = $messages[count($messages)-1];
		}

		return view("inbox", compact("conversationsMyService", "conversations"));

	}

	static public function newMessage($message,$conversation_id, $sender)
  {
		$conversation = Conversations::find($conversation_id);
		$newMessage = json_decode($conversation->message);
		$newMessage[] = ["message" => $message, "date" => date("Y-m-d"), "time" => date("H:i:s"), "sender" => $sender, "state" => 6];

		$conversation->update([
			"message" => json_encode($newMessage)
		]);

	}

	public function saveMessage(Request $request)
  {
		ConversationController::newMessage($request->input('message'), $request->input('conversation'), Auth::User()->id);
	}

	public function showConversation($id_conversation){

		$conversation = Conversations::find($id_conversation);

		$messages = json_decode($conversation->message);

		foreach ($messages as $key => $value) {
			$messages[$key]->state = 1;
		}

		$conversation->update([
			"message" => json_encode($messages)
		]);

		$deal = Deal::where("service_id","=",$conversation->service_id)
									->where("user_id","=",$conversation->applicant_id)
									->orderBy('created_at','desc')
									->first();

		$dealState = DealState::where('deal_id','=',$deal->id)
													->orderBy('created_at','desc')
													->first();

		return view('conversation', compact("conversation","deal","dealState"));

	}

	public function messagesConversation($id_conversation){

		$conversation = Conversations::find($id_conversation);
		$messages = json_decode($conversation->message);
		$conversation["message"] = $messages;

		$deal = Deal::where("service_id","=",$conversation->service_id)
									->where("user_id","=",$conversation->applicant_id)
									->orderBy('created_at','desc')
									->first();

		$dealState = DealState::where('deal_id','=',$deal->id)
													->orderBy('created_at','desc')
													->first();

		return view('messages', compact("conversation","deal","dealState"));

	}

	public function deal(Request $request)
	{

		/*
		$this->validate($request, [
        'service' => 'required',
        'applicant' => 'required',
        'dealDate' => 'required|date|after:tomorrow',
        'dealHour' => 'required',
        'dealLocation' => 'required',
        'valueService' => 'required'
    ]);
		*/

    $deal = new Deal;
		$deal->user_id = $request->applicant;
    $deal->service_id = $request->service;
    $deal->date = $request->dealDate;
    $deal->time = $request->dealHour;
    $deal->location = $request->dealLocation;
    $deal->value = $request->valueService;
    $deal->description = $request->observations;
    $deal->conversations_id = $request->conversation;
		$deal->save();

		$dealState = new DealState;
		$dealState->deal_id = $deal->id;
		$dealState->state_id = 4;
		$dealState->save();

		return redirect()->back();
	}

	public function dealUpdate(Request $request)
	{		
		$dealState = new DealState;		
    $email = new EmailController;

    if(!is_null($request->agree))
    {
      $dealState->state_id = 7;
      $dealState->deal_id = $request->deal;
      $dealState->save();      
      //$email->sendMailDeal($deal);
		}
		if(!is_null($request->decline))
		{
			$dealState->state_id = 8;
      $dealState->deal_id = $request->deal;
      $dealState->save();      
		}
		return redirect()->back();
	}

}
