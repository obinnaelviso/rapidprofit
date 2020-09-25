<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AccountStatus
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

        // Check account Status
        if($this->checkAccountInactive())
            return redirect()->route('login')->with('failed',
            'Your account has being temporarily blocked due to security reasons.
            Please live chat with our team or send us a support ticket at
            '.config('mail.from.address').' with the email address of the affected account. Thanks.');
        return $next($request);
    }

    function checkAccountInactive() {
        if(Auth::user()->status->title == config('status.inactive')) {
            Auth::guard('web')->logout();
            return true;
        } else return false;
    }
}
