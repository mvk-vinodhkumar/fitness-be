<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Define the allowed origins, methods, and headers

        // Local Server
        $allowedOrigins = ['http://localhost:5173'];

        // Staging Server
        // $allowedOrigins = ['https://livezy.six30labs.com'];

        $allowedMethods = ['GET', 'POST', 'PUT', 'DELETE'];
        $allowedHeaders = ['Content-Type', 'X-Requested-With', 'access-control-allow-origin', 'mode'];

        // Set the CORS headers
        $response = $next($request);
        $response->headers->set('Access-Control-Allow-Origin', implode(', ', $allowedOrigins));
        $response->headers->set('Access-Control-Allow-Methods', implode(', ', $allowedMethods));
        $response->headers->set('Access-Control-Allow-Headers', implode(', ', $allowedHeaders));

        return $response;
    }
}
