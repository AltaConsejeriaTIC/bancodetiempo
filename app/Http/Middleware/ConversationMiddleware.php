<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Conversations;
use Illuminate\Support\Facades\Auth;

class ConversationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $conversation = Conversations::find($request->route('conversation_id'));
        if(!is_null($conversation)){
            if($conversation->applicant_id == Auth::id() || $conversation->service->user->id == Auth::id()){
                return $next($request);
            }else{
                 return redirect('home');
            }
        }
        return redirect('home');

    }
}
