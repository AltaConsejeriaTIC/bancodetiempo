<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Conversations;
use App\Models\Deal;
use App\Models\DealState;
use App\Http\Controllers\EmailController;
use App\Models\SuggestedSites;
use App\Models\CategoriesSites;

class ConversationController extends Controller{

	public function index(){
		$conversationsMyService = $this->getConversationsMyService();
		$conversations = $this->getConversationServicesInterestMe();
        $categoriesSites = CategoriesSites::all();
		return view("inbox/inbox", compact("conversationsMyService", "conversations", "categoriesSites"));
	}
        private function getConversationsMyService(){
            $conversations = Conversations::whereIn("service_id", $this->getMyServices())->orderBy('updated_at', 'desc')->get();
            foreach ($conversations as  $key => $conversation) {
                $messages = json_decode($conversation->message);
                $conversations[$key]["lastMessage"] = $messages[count($messages)-1];
                $conversations[$key]["interval"] = $this->getInterval($conversation->updated_at);
                $conversations[$key]["notRead"] = ($conversation->lastMessage->state == 6 && $conversation->lastMessage->sender != Auth::user()->id) || $this->pendingDeal($conversation);
            }
            return $conversations;
        }
        private function getConversationServicesInterestMe(){
            $conversations = Conversations::where("applicant_id", Auth::user()->id)->orderBy('updated_at', 'desc')->get();
            foreach ($conversations as  $key => $conversation) {
                $messages = json_decode($conversation->message);
                $conversations[$key]["lastMessage"] = $messages[count($messages)-1];
                $conversations[$key]["interval"] = $this->getInterval($conversation->updated_at);
                $conversations[$key]["notRead"] = ($conversation->lastMessage->state == 6 && $conversation->lastMessage->sender != Auth::user()->id) || $this->pendingDeal($conversation);
            }
            return $conversations;
        }
            private function getInterval($date){
                $datetime1 = new \DateTime($date);
                $datetime2 = new \DateTime(\date("Y-m-d H:i:s"));
                $interval = $datetime1->diff($datetime2);
                if($interval->y > 0){
                    return "Hace ".$interval->y." Años";
                }
                if($interval->m > 0){
                    return "Hace ".$interval->m." Meses";
                }
                if($interval->d > 0){
                    return "Hace ".$interval->d." Dias";
                }
                if($interval->h > 0){
                    return "Hace ".$interval->h." Horas";
                }
                if($interval->i > 0){
                    return "Hace ".$interval->i." Minutos";
                }
                if($interval->s > 0){
                    return "Hace ".$interval->s." Segundos";
                }
            }
            private function getMyServices(){
                $myServices = Auth::User()->services;
                $listServices = [];
                foreach($myServices as $services){
                    $listServices[] = $services->id;
                }
                return $listServices;
            }
        private function pendingDeal($conversation){
            if($conversation->deals->count() > 0){
                $deal = $conversation->deals->last();
                if($deal->state_id == 4 && $deal->creator_id != Auth::id() || $deal->state_id == 12){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
	
    public function saveMessage(Request $request){        
		ConversationController::newMessage($request->input('message'), $request->input('conversation'), Auth::User()->id);
	}

    public function getDealConversation(Request $request){
        $response = [];
        $conversation = Conversations::find($request->conversation);
        if(Auth::id() == $conversation->applicant_id || Auth::id() == $conversation->service->user_id){
            $deal = $this->getDeal($conversation);
            if($deal){
                $response['state'] = 'ok';
                $response['deal'] = $deal->id."_".$deal->state_id;
                $response['deal_state'] = $deal->state_id;
                $response['applicant'] = $deal->user_id;
                $response['applicant_name'] = $deal->user->first_name;
                $response['offerer_name'] = $deal->service->user->first_name;
                $response['service'] = $deal->service->name;
                $response['date'] = $deal->date." ".$deal->time;
                $response['place'] = $deal->location;
                $response['credits'] = $deal->value;
                $response['observations'] = $deal->description;
                $response['creator'] = $deal->creator_id;
                $response['creator_name'] = $deal->creator->first_name;
                $receptor = $deal->creator_id == $deal->user_id ? $deal->service->user : $deal->user;
                $response['receptor_name'] = $receptor->first_name;
                $response['coordinates'] = $deal->coordinates;
                $response['applicant_observation'] = $deal->applicant_observation;
                $response['offerer_observation'] = $deal->offerer_observation;
            }else{
                $response['state'] = 'ok';
                $response['deal'] = 'none';
            }
        }else{
            $response['state'] = 'error';
        }
        return json_encode($response);
    }
    private function getDeal($conversation){
        $deal = Deal::where("conversations_id", $conversation->id)->get();
        if($deal->count() == 0){
            return false;
        }else{
            return $deal->last();
        }
    }

    public function messagesConversation(Request $request){
        $conversation = Conversations::find($request->conversationId);
        $key = md5($conversation->message);
        if($request->input('key') != $key){
            $this->messagesMarkRead($conversation);
            $conversation["key"] = $key;
            $conversation["message"] = json_decode($conversation->message);
            return view('inbox/messages', compact("conversation"));
        }
    }
        private function messagesMarkRead($conversation){
            $messages = collect(json_decode($conversation->message));
            if($messages->last()->state == 6 && $messages->last()->sender != Auth::id()){
                $messages->last()->state = 5;
            }
            $conversation->update([
                'message' => $messages->toJson()
            ]);
        }
/** static functions**/

    static public function newMessage($message,$conversation_id,$sender){
        $conversation = Conversations::find($conversation_id);
        $sendingMessage = ConversationController::blockMessageSending($message);
        $newMessage = json_decode($conversation->message);
        $newMessage[] = [
            "message" => $sendingMessage['message'],
            "date" => date("Y-m-d"),
            "time" => date("H:i:s"),
            "sender" => $sender, "state" => 6,
            'substitutionsNumber' => $sendingMessage['substitutionsNumber']
        ];
        $conversation->update([
            "message" => json_encode($newMessage)
        ]);
    }
    static function blockMessageSending($message){
        $message = ConversationController::blockEmailSending($message);
        $substitutionsNumber = $message[1];
        $message = ConversationController::blockEmailSendingForDomain($message);
        $substitutionsNumber = $message[1];
        $message = ConversationController::blockNumberPhoneSending($message[0]);
        $substitutionsNumber += $message[1];		
        return ["message" => $message[0], "substitutionsNumber" => $substitutionsNumber];
    }
    static function blockEmailSending($message){
        $regex = "/[\w-\.]{3,} ?@ ?([\w-]{2,}\.)*([\w-]{2,} ?\.?) ?[\w-]{2,4}/";
        $text = preg_replace($regex, 'xxxxxxx@xxxxxx', $message, -1, $substitutionsNumber);
        return [$text, $substitutionsNumber];
    }
    static function blockEmailSendingForDomain($message){
        $regex = "/[\w-\.]{3,} ?@ *(gmail|yahoo|hotmail|outlook)\.* ?[\w-]{2,4}/";
        $text = preg_replace($regex, 'xxxxxxx@xxxxxx', $message, -1, $substitutionsNumber);
        return [$text, $substitutionsNumber];
    }
    static function blockNumberPhoneSending($message){
        $regex = "/(\+? *5 *7(( *\d){10}|( *\d){7}))|( *\d){10}|( *\d){7}/";
        $text = preg_replace($regex, ' xxxxxxx', $message, -1, $substitutionsNumber);
        return [$text, $substitutionsNumber];
    }
}