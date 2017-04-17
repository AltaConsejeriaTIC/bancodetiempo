<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Groups;

class GroupsController extends Controller
{
    //post
    public function create(Request $request){

        Groups::create([
            'name' => $request->input('nameGroup'),
            'description' => $request->input('descriptionGroup'),
            'image' => '',
            'creator_id' => Auth::User()->id,
            'admin_id' => Auth::User()->id,
            'state_id' => 1
        ]);

    }

}
