<?php

namespace App\Http\Middleware;

use Closure;

class cors
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

        header("Access-Control-Allow-Origin: *");
        header('Content-type: application/json');
        
        // ALLOW OPTIONS METHOD
        $headers = [
            'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE, OPTIONS',
            'Access-Control-Allow-Headers' => 'X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers, apikey,Origin'
        ];
        if ($request->getMethod() == "OPTIONS") {
            // The client-side application can set only headers allowed in Access-Control-Allow-Headers
            return \Response::make('OK', 200, $headers);
        }
        $response = $next($request);
        foreach ($headers as $key => $value)
             $response->headers->set($key, $value); 
        return $response;
        
    }
}
