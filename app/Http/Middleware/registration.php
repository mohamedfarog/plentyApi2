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
            if ($otp) {
                if ($request->header('AuthRegister') == $otp->code) {
                    return $next($request);
                } else {
                    return response()->json(['error' => 'Unauthorized client!'], 401);
                }
            } else {
                if ($request->header('DashRegister') != null) {
                    if (in_array($request->header('DashRegister'), ['NgBeW4dQFsiGiTiDUOlcam6H', 'JEvmfd9hfiURvdqXMYE39r4E', 'eT7JV88G9El3888Eu6gnoGFB'])) {
                        return $next($request);
                    } else {
                        return response()->json(['error' => 'Unauthorized client!'], 401);
                    }
                } else {

                    return response()->json(['error' => 'Unauthorized client!'], 401);
                }
            }
        } else {
            if ($request->header('DashRegister') != null) {
                if (in_array($request->header('DashRegister'), ['NgBeW4dQFsiGiTiDUOlcam6H', 'JEvmfd9hfiURvdqXMYE39r4E', 'eT7JV88G9El3888Eu6gnoGFB'])) {
                    return $next($request);
                } else {
                    return response()->json(['error' => 'Unauthorized client!'], 401);
                }
            } else {

                return response()->json(['error' => 'Unauthorized client!'], 401);
            }
        }
    }
}
