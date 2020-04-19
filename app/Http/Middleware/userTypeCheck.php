<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Redirect;
class userTypeCheck
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

        if(Auth::user()->user_type == 'admin'){
            return Redirect::route('adminHome');
        }
        return $next($request);
    }
}
