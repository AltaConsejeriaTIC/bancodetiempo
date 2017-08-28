<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;
use Mail;
use App\User;
use App\Models\Conversations;
use App\Models\Message;


class EmailController extends Controller
{
    public function defaultSend (Request $request, $serviceId)
    {
    	$service = Service::findOrFail($serviceId);

  		$mail = $service->user->email2;
  		
  		$myImageProfile = url("/").Auth::user()->avatar;
  		
  		$imageProfile = url("/").$service->user->avatar;
  		
        $imageService = url("/").$service->image;
        
    	$content = ConversationController::blockMessageSending($request->input('content'));

    	Mail::send('mailContact',["service" => $service, "userauth" => Auth::user(), "myImageProfile" => $myImageProfile, "imageProfile" => $imageProfile, "imageService" => $imageService,'content' => $content["message"]], function ($message) use ($mail, $service){
    		$message->from('bancodetiempo@cambalachea.co','Cambalachea!');
    		$message->subject(Auth::user()->first_name." esta interesado en tu oferta ".$service->name);
    		$message->to($mail);
    	});
        
        $conversation = Conversations::where("service_id", $service->id)->where("applicant_id", Auth::User()->id)->first();

        if(count($conversation) == 0){
            $conversation = Conversations::create([
                "service_id" => $service->id,
                "applicant_id" => Auth::User()->id,
                "message" => "[]"
            ]);
        }

        ConversationController::newMessage($content["message"], $conversation->id, Auth::User()->id);    	

    	return redirect()->back()->with('response', true);    	
    }

    public function sendMailDeal($Addressee,$sender,$service,$action){
        $Addressee = User::findOrFail($Addressee);
        $sender = User::findOrFail($sender);
        $mail = $Addressee->email2;
        $subject = '';
        switch($action){
            case 'new':
               $subject = 'Te han enviado una propuesta';     
            break;
            case 'acepted':
               $subject = $sender->first_name.' ha aceptado tu propuesta';     
            break;
            case 'ranking':
                $subject = 'Califica el trato con '.$sender->first_name; 
            break;
        }          
        Mail::send('emails/deal',["Addressee" => $Addressee, "action" => $action, "sender" => $sender, "service" => $service], function ($message) use ($mail, $subject){
            $message->from('info@cambalachea.co','Cambalachea!');
            $message->subject($subject);
            $message->to($mail);
        });
        return redirect()->back();
    }

    public function sendMailDaily(){    
        $receptors = collect([]);
        $Conversations = Conversations::whereBetween("updated_at", [date("Y-m-d 00:00:00"), date("Y-m-d 23:59:59")])->get();
        foreach($Conversations as $conversation){
            $message = collect(json_decode($conversation->message))->last(); 
            if($message->state == 6){
                $receptor = $conversation->applicant_id == $message->sender ? $conversation->service->user_id : $conversation->applicant_id;
                if(!$receptors->has($receptor)){                                    
                    $receptors->put($receptor, collect(["user" => user::find($receptor), "messages" => collect([])]));
                }                    
                $receptors[$receptor]["messages"]->push(["sender" => user::find($message->sender), "message" => $message->message]);
            }
        }
        
        foreach($receptors as $receptor){
            
            if($receptor["messages"]->count() > 1){
                $subject = "¡ ".$receptor["messages"][0]["sender"]->first_name;
                $subject .= ", ".$receptor["messages"][1]["sender"]->first_name;
                $subject .= " y otros cambalacheros desean comunicarse contigo en Bogotá Cambalachea!";
            }else{
                $subject = "¡ ".$receptor["messages"][0]["sender"]->first_name." está interesado en tomar una de tus ofertas en Bogotá Cambalachea¡";
            }
            Mail::send('emailDaily', ["receptor" => $receptor], function ($message) use ($receptor, $subject){
                $message->from('info@cambalachea.co','Cambalachea!');
                $message->subject($subject);
                $message->to($receptor["user"]->email2);
            });
        }
    }
   
}
