<?php 

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware extends Type 
{
  public function getType()
  {
    return 1;
  }
}