<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;


class CookieController extends Controller
{
    public function setCookie(Request $request)
    {
        $minutes = 100;
        $response = new Response();
        $response->withCookie(cookie('bearer_token', 'mytoken', $minutes));
        return $response;
    }
    public function getCookie(Request $request)
    {
        $value = $request->cookie('bearer_token');
        echo $value;
    }
    public function removeCookie(Request $request)
    {
        $response = new Response();
        $response->withCookie(cookie('bearer_token', null));
        return $response;
    }
}
