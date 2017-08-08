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

        ConversationController::newMessage($content["message"], $conversation->id, Auth::User()->id,0,0);
    	

    	return redirect()->back()->with('response', true);    	
    }

    public function sendMailDeal($Addressee,$action)
        {
          $Addressee = User::findOrFail($Addressee);
          $mail = $Addressee->email2;
          Mail::send('deals/dealEmail',["Addressee" => $Addressee, "action" => $action], function ($message) use ($mail)
          {
            $message->from('bancodetiempo@cambalachea.co','Cambalachea!');
            $message->subject('Te han enviado una propuesta');
            $message->to($mail);
          });
          return redirect()->back();
        }

    public function sendMailDaily()
    {      
        $Conversations = Conversations::all();

        foreach($Conversations as $conversation){
            $message = json_decode($conversation->message);
            $lastMessage = end($message);
            if($lastMessage->state == 6){
                if($lastMessage->sender != $conversation->applicant_id){
                    $addressee = $conversation->applicant;
                }else{
                    $addressee = $conversation->service->user;
                }

                Mail::send('emailDaily', ["user" => $addressee], function ($message) use ($addressee)
                {
                    $message->from('bancodetiempo@cambalachea.co','Cambalachea!');
                    $message->subject('Notificación');
                    $message->to($addressee->email2);
                });
            }
        }

    }
   
}
