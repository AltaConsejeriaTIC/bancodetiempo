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

    	$userauth = User::find ( auth::user ()->id );

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

    	$content = $request->input('content');

    	Mail::send('mailContact',["service" => $service, "userauth" => $userauth, "myImageProfile" => $myImageProfile, "imageProfile" => $imageProfile, "imageService" => $imageService,'content' => $content], function ($message) use ($mail){
    		$message->from('evenvivelab_bog@unal.edu.co','Cambalachea!');
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

        ConversationController::newMessage($content, $conversation->id, Auth::User()->id,0,0);
    	

    	return redirect()->back()->with('response', true);    	
    }

    public function sendMailDeal($Addressee,$stateDeal,$action)
    {
      if($action == "new")
      {
        $user = User::findOrFail($Addressee);        
        //dd($user,$stateDeal,$action);
      }
    }
}
