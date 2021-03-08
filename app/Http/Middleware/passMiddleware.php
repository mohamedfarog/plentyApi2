<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class passMiddleware
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
        
        if($request->header('Authorization') != null && in_array($request->header('Authorization'), ['NgBeW4dQFsiGiTiDUOlcam6H','JEvmfd9hfiURvdqXMYE39r4E','eT7JV88G9El3888Eu6gnoGFB'])){

            return $next($request);
        }elseif($request->header('authorization') != null && in_array($request->header('authorization'), ['NgBeW4dQFsiGiTiDUOlcam6H','JEvmfd9hfiURvdqXMYE39r4E','eT7JV88G9El3888Eu6gnoGFB'])) {
            return $next($request);

        }else{
            return response()->json(['error'=>'Unauthorized client!'], 401);
        }

    }
}
