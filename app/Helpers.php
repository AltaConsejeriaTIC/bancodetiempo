<?php
namespace App;
use Illuminate\Support\Facades\Auth;
use App\Models\Conversations;
use Illuminate\Http\Request;
class Helpers{
	
	static function getNotificationsUser(){		
        return Helpers::getCountNotificationsMyServices() + Helpers::getCountNotificationsServicicesInterest() + Helpers::getCountNotificationsDealsInterest() + Helpers::getCountNotificationsDealsMyServices();			
	}
    
    static function getCountNotificationsMyServices(){
        $notifications = 0;
        
        $myServices = Auth::User()->services;
        $listServices = [];
        foreach($myServices as $services){
            $listServices[] = $services->id;
        }
        $conversationsMyService = Conversations::whereIn("service_id", $listServices)->get();
		
		foreach ($conversationsMyService as  $key => $conversation) {
			$messages = json_decode($conversation->message);
			$count = count($messages);
            if($count != 0){
                $lastMessage = $messages[$count-1];
                if($lastMessage->state == 6 && $lastMessage->sender != Auth::User()->id){
                    $notifications += 1;
                }
            }
		}
        
        return $notifications;
    }
    
    static function getCountNotificationsServicicesInterest(){
        $conversations = Conversations::where("applicant_id", Auth::user()->id)->get();
		$notifications = 0;
        
        foreach ($conversations as  $key => $conversation) {
			$messages = json_decode($conversation->message);
            $count = count($messages);
            if($count != 0){
                $lastMessage =  $messages[$count-1];
                if($lastMessage->state == 6 && $lastMessage->sender != Auth::User()->id){
                    $notifications += 1;
                }
            }
		}
		return $notifications;
    }
    
    static function getCountNotificationsDealsMyServices(){
        $notifications = 0;
        
        $myServices = Auth::User()->services;
        $listServices = [];
        foreach($myServices as $services){
            $listServices[] = $services->id;
        }
        $conversationsMyService = Conversations::whereIn("service_id", $listServices)->get();
		
		foreach ($conversationsMyService as  $key => $conversation) {
			if($conversation->deals->count() > 0){
                $deal = $conversation->deals->last();
                if($deal->state_id == 4 && $deal->creator_id != Auth::id() || $deal->state_id == 12){
                    $notifications += 1;
                }
            }
		}
        
        return $notifications;
    }
    
    static function getCountNotificationsDealsInterest(){
        $conversations = Conversations::where("applicant_id", Auth::user()->id)->get();
		$notifications = 0;
        
        foreach ($conversations as  $key => $conversation) {
            if($conversation->deals->count() > 0){
                $deal = $conversation->deals->last();
                if($deal->state_id == 4 && $deal->creator_id != Auth::id() || $deal->state_id == 12){
                    $notifications += 1;
                }
            }
		}
		return $notifications;
    }

    static function uploadImage($file, $name = '', $directory = 'resources/'){

        if(!$file){
          return false;
        }
        $imageName = $name == '' ? date("Ymd").rand(000,999) : $name;

        $file->move ( base_path () . '/public/' . $directory, $imageName. '.' .$file->getClientOriginalExtension() );

		return $directory . $imageName . '.' . $file->getClientOriginalExtension();
    }
	
    static function getStepsUser(){
        $pass1 = Auth::user()->privacy_policy == 1 ? 1 : 0;
        $pass2 = Auth::user()->interests->count() >= 1 ? 1 : 0;
        $pass3 = Auth::user()->services->count() >= 1 ? 1 : 0;
        session(['pass1' => $pass1]);
        session(['pass2' => $pass2]);
        session(['pass3' => $pass3]);
    }

    static function getLastStep(){

        if(session('pass1') == 0){
            return 'Pass1';
        }
        if(session('pass2') == 0){
            return 'Pass2';
        }
        if(session('pass3') == 0){
            return 'Pass3';
        }

    }

    static function getRedirectLastStep(){
        Helpers::getStepsUser();
        $lastStep = Helpers::getLastStep();
        return  'redirect'.$lastStep;

    }

    static function intervalDate($date1, $date2 = 0){

        if($date2 == 0){
            $date2 = \date("Y-m-d");
        }

        $datetime1 = new \DateTime($date1);
        $datetime2 = new \DateTime($date2);
        $interval = $datetime1->diff($datetime2);
        return $interval->format('%a');

    }
    
    static function countDealsFinished($user){
        $total = 0;
        if($user->conversations->count() != 0){
            foreach($user->conversations as $conversation){
                foreach($conversation->deals as $deal){
                    if($deal->state_id == 10){
                        $total += 1;
                    }
                }
            }
        }
        return $total;
                                                
    }
    
    static function rangoFecha($fecha){
        if($fecha != ''){
            $fecha = explode("|", $fecha);
            $fecha1 = date("m/d/Y", strtotime($fecha[0]));
            $fecha2 = date("m/d/Y", strtotime($fecha[1]));
            return $fecha1." - ".$fecha2;
        }else{
            return "";
        }
    }


}
?>
