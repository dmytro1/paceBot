<?php

namespace App\Http\Middleware;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        $response = $next($request);
        $response->header('Access-Control-Allow-Origin','*');
        return $response;
    }
}
