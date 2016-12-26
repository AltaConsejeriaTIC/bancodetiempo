<?php 

namespace App\Http\Middleware;

use Closure;

class UserMiddleware extends Type 
{
  public function getType()
  {
    return 2;
  }
}