<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index()
    {
        $cart = Cart::where('user_id', Auth::id())->get();
        if ($cart)
            return response()->json(['cart' => $cart]);
        else
            return response()->json(['error' => 'Cart details not found']);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            foreach ($request->cart as $element) {
                if (isset($request->id)) {
                    $cart = Cart::find($request->id);
                } else {
                    $cart = new Cart();
                }

                if (isset($request->pid)) {
                    $cart->pid = $request->pid;
                }
                if (isset($request->quantity)) {
                    $cart->quantity = $request->quantity;
                }
                if (isset($request->image)) {
                    $cart->image = $request->image;
                }
                if (isset($request->category)) {
                    $cart->category = $request->category;
                }
                if (isset($request->name)) {
                    $cart->name = $request->name;
                }
                if (isset($request->price)) {
                    $cart->price = $request->price;
                }
                if (isset($request->key)) {
                    $cart->key = $request->key;
                }
                if (isset($request->size)) {
                    $cart->size = $request->size;
                }
                if (isset($request->shop_id)) {
                    $cart->shop_id = $request->shop_id;
                }
                if (isset($request->date)) {
                    $cart->date = $request->date;
                }
                if (isset($request->time)) {
                    $cart->time = $request->time;
                }
                if (isset($request->fsize)) {
                    $cart->fsize = $request->fsize;
                }
                if (isset($request->fcolor)) {
                    $cart->fcolor = $request->fcolor;
                }
                if (isset($request->fsizename)) {
                    $cart->fsizename = $request->fsizename;
                }
                if (isset($request->fcolorname)) {
                    $cart->fcolorname = $request->fcolorname;
                }
                if (isset($request->timeslot_id)) {
                    $cart->timeslot_id = $request->timeslot_id;
                }
                if (isset($request->user_id)) {
                    $cart->user_id = $request->user_id;
                }
                $cart->save();
                return response()->json(['success' => !!$cart]);
            }
        } else {
            return response()->json(['Error' => 'Unauthorised User']);
        }
    }
}
