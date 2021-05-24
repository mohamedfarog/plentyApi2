<?php

namespace App\Http\Controllers;

use App\Models\Giftcard;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GiftcardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /*
     $table->string('code')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('redeemed_user_id')->nullable();
            $table->double('amount');
            $table->tinyInteger('status')->default(0);
     */


    public function store(Request $request)
    {

        $user = Auth::user();
        $gift = new Giftcard();
        $code = Str::random(6);
        $gift->user_id = $user->id;
        $gift->amount = $request->amount;
        $run = true;
        while ($run) {
            $card = Giftcard::where('code', $code)->first();
            if ($card != null) {
                $code =  Str::random(6);
            } else {
                $gift->code = $code;
                $run = false;
            }
        }
        

        $gift->save();

        $trans = new Transaction();

        $paygateway = $trans->createpayment($user, $request->amount, $gift->id, $gift->id, false, true);
        return response()->json(['success' => true, 'trans' => $paygateway, 'user' => $user]);
    }
}
