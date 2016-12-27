<?php 

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Session;

abstract class Type 
{

  /**
   * @var Guard
   */
  private $auth;

  public function __construct(Guard $auth)
  {
      $this->auth = $auth;
  }

  abstract public function getType();

  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {    
    if($this->auth->user()->role_id != $this->getType() || $this->auth->user()->state_id == 3) 
    {
      $this->auth->logout();

      if ($request->ajax()) 
      {
          return response('Unauthorized.', 401);
      } 
      else 
      {
          Session::flash('errorLogin', 'No tiene permisos para el recurso solicitado o puede que su usuario se encuentre Bloqueado');
          return redirect()->back();
      }
    }

    return $next($request);

  }

}
