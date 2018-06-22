<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;


class Client
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
        if(Auth::id() !== null){
            $auth = Auth::id();
            $user = User::where('id',$auth)->first();
            if($user->role === 'client'){
                return $next($request);

            }
        }

        return response('Unauthorized',401);
    }
}
