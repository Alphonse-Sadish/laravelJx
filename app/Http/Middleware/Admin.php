<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;


class Admin
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
            if($user->role === 'admin'){
                return $next($request);

            }
        }

        abort(403, 'Unauthorized action.');



    }
}
