<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Conversations;
use App\Models\Deal;
use App\Models\DealState;
use App\Http\Controllers\EmailController;

class ConversationController extends Controller{

	public function index(){

		$conversationsMyService = Conversations::whereIn("service_id", $this->getMyServices())->orderBy('updated_at', 'desc')->get();

		$conversations = Conversations::where("applicant_id", Auth::user()->id)->orderBy('updated_at', 'desc')->get();

		foreach ($conversationsMyService as  $key => $conversation) {

			$messages = json_decode($conversation->message);

			$conversationsMyService[$key]["lastMessage"] = $messages[count($messages)-1];
		}

		foreach ($conversations as  $key => $conversation) {

			$messages = json_decode($conversation->message);

			$conversations[$key]["lastMessage"] = $messages[count($messages)-1];
		}

		return view("inbox/inbox", compact("conversationsMyService", "conversations"));

	}

    public function getMyServices(){

        $myServices = Auth::User()->services;

        $listServices = [];

        foreach($myServices as $services){
            $listServices[] = $services->id;
        }

        return $listServices;

    }

	static public function newMessage($message,$conversation_id,$sender,$deal,$dealState)
  {
		$conversation = Conversations::find($conversation_id);
		$newMessage = json_decode($conversation->message);
		$newMessage[] = ["message" => $message, "date" => date("Y-m-d"), "time" => date("H:i:s"), "sender" => $sender, "state" => 6,"deal" => $deal,"dealState" => $dealState];

		$conversation->update([
			"message" => json_encode($newMessage)
		]);

	}

	public function saveMessage(Request $request){
		ConversationController::newMessage($request->input('message'), $request->input('conversation'), Auth::User()->id,0,0);
	}

	public function showConversation($id_conversation){

		$conversation = Conversations::find($id_conversation);

		$messages = json_decode($conversation->message);

		foreach ($messages as $key => $value) {
            if($messages[$key]->sender != Auth::id()){
                $messages[$key]->state = 5;
            }
		}

		$conversation->update([
			"message" => json_encode($messages)
		]);

		$deal = Deal::where("service_id","=",$conversation->service_id)
                    ->where("user_id","=",$conversation->applicant_id)
                    ->orderBy('id','desc')
                    ->first();
		if($deal)
			$dealState = DealState::where('deal_id','=',$deal->id)
                                    ->orderBy('id','desc')
                                    ->first();
		else
			$dealState = null;

		return view('inbox/conversation', compact("conversation","deal","dealState"));

	}

	public function messagesConversation(Request $request, $id_conversation){

		$conversation = Conversations::find($id_conversation);
        $deal = $conversation->deals->last();
        $lastState = is_null($conversation->deals->last()) ? 0 : $conversation->deals->last()->dealStates->last()->state_id;
        $key = md5($conversation->message.$lastState);
        if($request->input('key') != $key){
            $conversation["key"] = $key;
            $conversation["message"] = json_decode($conversation->message);
            $deals = Deal::all();

            $dealState = $this->getDealConversation($deal, $conversation);

            return view('inbox/messages', compact("conversation","deal","dealState","deals"));
        }else{
            print("");
        }

	}

    public function getDealConversation($deal, $conversation){

        if($deal){
            return DealState::where('deal_id','=',$deal->id)->orderBy('id','desc')->first();
        }else{
			return null;
        }
    }

	public function deal(Request $request)
	{
		$email = new EmailController;
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

		ConversationController::newMessage("¡Has enviado un propuesta!", $request->conversation, Auth::User()->id,$deal->id,$dealState->state_id);

		$email->sendMailDeal($deal->user_id,"new");
		
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
	    ConversationController::newMessage("Propuesta Aceptada", $request->conversation, Auth::User()->id,$request->deal,$dealState->state_id);

    	if($request->applicant == Auth::id())
    	{    	
	      $email->sendMailDeal($request->userService,"agree");
    	}
    	if($request->userService == Auth::id())
    	{    		
    		$email->sendMailDeal($request->applicant,"agree");
    	}
		}

		if(!is_null($request->decline))
		{			
			$dealState->state_id = 8;
      $dealState->deal_id = $request->deal;
      $dealState->save();
      ConversationController::newMessage("Propuesta Cancelada", $request->conversation, Auth::User()->id,$request->deal,$dealState->state_id);
      
      if($request->applicant == Auth::id())
    	{    	
	      $email->sendMailDeal($request->userService,"decline");
    	}
    	if($request->userService == Auth::id())
    	{    		
    		$email->sendMailDeal($request->applicant,"decline");
    	}
		}
		
		return redirect()->back();
	}

}
