<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;
use Mail;
use App\User;


class EmailController extends Controller
{
    public function defaultSend ($serviceId)
    {
        $service = Service::findOrFail($serviceId);
        $user = User::find($service->user_id);
        $mail = $user->email;
        log::info("Request cycle without Queues started");
        $text='Hola!, '.$user->first_name." ".$user->last_name.' quiere contactar con tigo revisa tus notificaciones en cambalachea!';
        Mail::raw($text,function ($message) use ($mail){
            $message->from('evenvivelab_bog@unal.edu.co','Cambalachea!');
            $message->subject('Notificación');
            $message->to($mail);
            log::info("end of mail processing...");
        });
        log::info("Request cycle without Queues finished");
        return redirect()->back();

    }
}
