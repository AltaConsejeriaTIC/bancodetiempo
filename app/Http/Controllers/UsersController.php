<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function findUsers(Request $request){

        $users = User::select('id', 'first_name', 'last_name', 'avatar')->where('role_id', 2)->where('state_id' , 1)->orderBy('first_name');
        print($users->get()->toJson());

    }
}
