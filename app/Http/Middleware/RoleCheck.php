<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleCheck
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
        if(Auth::user()->role_id == role(config('roles.admin')))
            return $next($request);
        else {
            Auth::guard('web')->logout();
            return redirect('login')->with('failed', 'Access Denied! Something went wrong!');
        }
    }
}
