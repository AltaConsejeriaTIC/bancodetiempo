<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use JavaScript;

class RegisterController extends Controller
{
    public function showFrom()
    {

        $user = User::findOrFail(Auth::user()->id);

        JavaScript::put([
            'userJs' => $user,
            'dayJs' => is_null($user->birthDate) ? "0" : date("d", strtotime($user->birthDate)),
            'mounthJs' => is_null($user->birthDate) ? "0" : date("m", strtotime($user->birthDate)),
            'yearJs' => is_null($user->birthDate) ? "0" : date("Y", strtotime($user->birthDate)),

        ]);

        return view('auth/register', compact('user'));
    }
}
