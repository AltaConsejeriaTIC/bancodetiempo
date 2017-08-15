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

    	$userauth = User::find(auth::user()->id);

  		$mail = $service->user->email2;

  		$myImageProfile = '';
  		if (strpos ( $userauth->avatar, "http" ) === false) {

  			$myImageProfile = "http://" . $_SERVER ['SERVER_NAME'] . "/" . $userauth->avatar;
  		} else {
  			$myImageProfile = $userauth->avatar;
  		}

  		$imageProfile = '';
  		if (strpos ( $service->user->avatar, "http" ) === false) {

  			$imageProfile = "http://" . $_SERVER ['SERVER_NAME'] . "/" . $service->user->avatar;
  		} else {
  			$imageProfile = $service->user->avatar;
  		}

  		$imageService = '';
  		if (strpos ( $service->image, "http" ) === false) {

  			$imageService = "http://" . $_SERVER ['SERVER_NAME']."/".$service->image;
      }else{
      		$imageService = $service->image;
      }  
    	$content = ConversationController::blockMessageSending($request->input('content'));

    	Mail::send('mailContact',["service" => $service, "userauth" => $userauth, "myImageProfile" => $myImageProfile, "imageProfile" => $imageProfile, "imageService" => $imageService,'content' => $content["message"]], function ($message) use ($mail){
    		$message->from('bancodetiempo@cambalachea.co','Cambalachea!');
    		$message->subject('Notificación');
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
        $Conversations = Conversations::all();
        foreach($Conversations as $conversation){
            $message = collect(json_decode($conversation->message))->last(); 
            if($message->state == 6){
                $receptor = $conversation->applicant_id == $message->sender ? $conversation->service->user_id : $conversation->applicant_id;
                if($receptors->has($receptor)){                                    
                    $receptors[$receptor] += 1;
                }else{
                    $receptors->put($receptor, 1);
                }
            }
        }
        foreach($receptors as $receptor => $notifications){
            $receptor = User::find($receptor);
            Mail::send('emailDaily', ["notifications" => $notifications, "user" => $receptor], function ($message) use ($receptor){
                $message->from('bancodetiempo@cambalachea.co','Cambalachea!');
                $message->subject('Notificación');
                $message->to($receptor->email2);
            });
        }
    }
   
}
