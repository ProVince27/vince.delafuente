<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;

class SecurityHeaderMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        // return $nex($request);
        $response = $next($request);
        $response->header('X-SYSTEM-SECURITY','12345');
        $response->header('SECRET-KEY','12345');
        return $response;
    }
}
