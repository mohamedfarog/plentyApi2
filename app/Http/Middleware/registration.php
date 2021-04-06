<?php

namespace App\Http\Middleware;

use App\Models\Otp;
use Closure;
use Illuminate\Http\Request;

class registration
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
        $otp = Otp::where('contact', $request->contact)->first();
        if ($request->header('AuthRegister') != null) {
            if($otp){
                if ($request->header('AuthRegister') == $otp->code) {
                    return $next($request);
                }else {
                    return response()->json(['error' => 'Unauthorized client!'], 401);
                }
            }else {
                return response()->json(['error' => 'Unauthorized client!'], 401);
            }
            
        }  else {
            return response()->json(['error' => 'Unauthorized client!'], 401);
        }
    }
}
