<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\User;
use Hash;

class ProfileController extends Controller
{
    public function changePassword()
    {
        return view('admin/changePasswordAdmin');
    }


    public function changePasswordAdmin(Request $request)
    {
        $rules = [
            'last_password' => 'required|min:6',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|min:6'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } else {

            $user = User::find(\Auth::user()->id);

            if (hash::check($request->last_password, $user->password)) {
                if ($request->new_password == $request->confirm_password) {
                    $user->password = bcrypt($request->new_password);
                    $user->save();
                    \Session::flash('success', 'Contraseña Actualizada Satisfactoriamente');
                    return redirect('admin/home');
                } else {
                    \Session::flash('error', 'Las contraseñas no coinciden');
                }
            } else {
                \Session::flash('error', 'La contraseña suministrada no es la correcta');
            }


            return redirect('admin/changePassword');
        }
    }
}
