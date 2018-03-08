<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class RegisterContact
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
	
		$user = Auth::guard('api')->user();
		if($user->api_token != $request->input('api_token')){
            return response()->json(['data' => 'You dont have permmition to.access this!'], 200);
		}
	
        return $next($request);
    }
}
