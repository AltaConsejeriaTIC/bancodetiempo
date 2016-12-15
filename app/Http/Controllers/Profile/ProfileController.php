<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
   public function showProfile()
    {
        $user = Auth::user();
        return view('profile/profile', compact('user'));
        

    }
   public function editProfile()
    {
        return view('profile/edit');
        
    }
}
