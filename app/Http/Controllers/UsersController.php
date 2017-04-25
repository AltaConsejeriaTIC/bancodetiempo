<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function findUsers(Request $request){

        $users = User::select('id', 'first_name', 'last_name', 'avatar', 'email2 as email')->where('role_id', 2)->where('state_id' , 1)->orderBy('first_name');
        $users = $users->get()->toArray();
        $json = [];
        foreach($users as $user){
            $json[$user['id']] = $user;
        }
        print(json_encode($json));

    }
}
