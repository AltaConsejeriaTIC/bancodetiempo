<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\State;
use Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function AdminLogin()
    {
      return view('admin/login');
    }

    /**
     * Show home Admin.
     *
     * @return Response
     */

    public function homeAdmin()
    {      
      return view('admin/homeAdmin');
    }

    /**
     * Show home Admin.
     *
     * @return Response
     */

    public function homeAdminUser()
    {
      $users = User::with('state','role')->orderBy('created_at','desc')->paginate(6);   
      $states = State::where('id','!=','2')->pluck('state','id');      
      return view('admin/users/list',compact('users','states'));
    }    

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
      try 
      {
        $ifexistUser = User::whereEmail($request->email)->first();
        
        if(!$ifexistUser) 
        {
          $user = new User;
          $user->first_name = $request->first_name;
          $user->last_name = $request->last_name;
          $user->email = $request->email;
          $user->password = bcrypt('secret');
          $user->state_id = 1;
          $user->role_id = 1;

          if ($user->save()) 
          {                     
            Session::flash('success', '¡El Usuario con E-Mail '.$request->email.' Se Registro con Exito!');
            return redirect('homeAdminUser');                 
          }    
        }         
        else 
        {                 
          Session::flash('error', '¡El Usuario con E-Mail '.$request->email.' Ya Existe!');                 
          return redirect('homeAdminUser');
        }      
        
      } 
      catch (Exception $e) 
      {
      }      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Request $request)
    {
      if($request->name != '')
      {
          $users = User::where('first_name', 'LIKE', "%$request->name%")->paginate(6);
          return view('admin/users/list', compact('users'));
      }
      else
      {
          return redirect('homeAdminUser');
      }        
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
      try 
      {        
        $user = User::find($request->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt('secret');
        $user->state_id = $request->state_id;        

        if ($user->save()) 
        {                     
          Session::flash('success', '¡El Usuario con E-Mail '.$request->email.' Se Actualizó con Exito!');
          return redirect('homeAdminUser');                 
        }
        else
        {
          Session::flash('error', '¡El Usuario con E-Mail '.$request->email.' NO se Actualizó!');
          return redirect('homeAdminUser');                   
        }
      } 
      catch (Exception $e) 
      {
      }              
    }
}
