<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class Roles
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

        if(Auth::user()->auth_type=='user'){
            return redirect()->route('dash');
        }

        return $next($request);
    }
}
