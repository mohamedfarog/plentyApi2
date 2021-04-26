<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthWeb
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

        if ($request->cookie('bearer_token')) {
            $request->headers->set('Authorization', 'Bearer ' . $request->cookie('bearer_token'));
            return $next($request);
        } else {
            return redirect('login');
        }
    }
}
