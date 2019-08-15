<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class IsAdmin
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
       if(\Auth::check()){
        {
            if(Auth::user()->role_id == '1')
            {
                return $next($request);
            }else
                return redirect()->route('shop');
        }
            
        }
         return redirect()->route('shop');
        }
       

}