<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function findUsers(Request $request){

        $find = $request->input('find');

        if(strlen($find) > 2){
            $users = User::select('id', 'first_name', 'last_name', 'avatar')->where('first_name', 'LIKE', "%$find%")->orWhere("last_name", "LIKE", "%$find%")->where('state_id' , 1);
            print($users->get()->toJson());
        }

    }
}
