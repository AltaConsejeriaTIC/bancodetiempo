<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Attainment;
use App\Models\AttainmentUsers;

class AttainmentsController extends Controller
{
    static function saveAttainment($attainment){

        if(Auth::user()->attainmentUsers->where('attainment_id', $attainment)->count() == 0){
            $attaiment = Attainment::find($attainment);
            Auth::user()->update([
                'credits' => Auth::user()->credits + $attaiment->value
            ]);
            AttainmentUsers::create([
                'attainment_id' => $attaiment->id,
                'user_id' => Auth::id(),
                'state_id' => 1
            ]);
        }

    }
}
