<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
	public function index(){
		
		$messages = Message::where('addressee', Auth::User()->id)->orderBy('created_at', "desc")->get();
		
		return view("inbox", compact("messages"));
		
	}
}
