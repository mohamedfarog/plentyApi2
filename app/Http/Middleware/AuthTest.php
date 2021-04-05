<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthTest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->hasCookie('bearer_token')) {
            return $next($request);
        }
        $response = $next($request);
        return $response->withCookie(cookie()->forever('bearer_token', 'alihassan'));
    }
}
