<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($request->header('apikey') == 'EgsIQjGV6oodeYMjJ0KD94Zmb8FsckXn5WHVb7OVwWp6bBnCeF2Vhj2aYmY7' ) {

            if (Auth::guard($guard)->check()) {

                return response()->json(['data' => 'Check your email and password!'], 200);
            }
        }else{
            return response()->json(['data' => 'Api key missing!'], 200);
        }

        return $next($request);
    }
}
