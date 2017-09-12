<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use JavaScript;

class RegisterController extends Controller
{
    public function finalizeRegister(){
        return view('auth/finalizeRegister');
    }
}
