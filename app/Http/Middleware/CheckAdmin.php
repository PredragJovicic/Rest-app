<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
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
		//$user = Auth::guard('api')->user();
		if(Auth::user()->admin != 1){ 
            return response()->json(['data' => 'You dont have permmition to.access this!'], 200);
		}
		
        return $next($request);
    }
}
