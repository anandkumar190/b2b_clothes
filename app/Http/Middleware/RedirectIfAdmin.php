<?php

namespace App\Http\Middleware;

use Session;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAdmin
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
        if(Auth::user())
        { 
            if(Auth::user()->user_type =='1')
            {
                return $next($request);
            }
            else
            {
                Session::flash("danger","You doesn't have admin access");
                return back();
            }
        }
        else
        {
            return redirect()->route('login');
        }
            
    }
}
