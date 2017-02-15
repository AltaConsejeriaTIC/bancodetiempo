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
    	
    	$conversation = Conversations::where('user1', $service->user->id)->where("user2", $userauth->id)->first();
    	
    	if(count($conversation) == 0){
    		$conversation = Conversations::where('user2', $service->user->id)->where("user1", $userauth->id)->first();
    		if(count($conversation) == 0){
    			$conversation = Conversations::create([
    					'applicant' => $userauth->id,
    					'service_id' => $service->id
    			]);
    		}
    	}
    	
    	
    	Message::create([
    		'conversation_id' => $conversation->id,
    		'state' => 0,
    		'sender' => $userauth->id,
    		'addressee' => $service->user->id,
    		'message' => $content
    	]);
    	
    	return redirect()->back()->with('response', true);
    	
    	//return view('mailContact',compact("service", "userauth", "imageProfile", "imageService" ,'content', "myImageProfile"));

    }
}
