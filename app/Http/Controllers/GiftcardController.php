<?php

namespace App\Http\Controllers;

use App\Models\Giftcard;
use App\Models\Transaction;
use App\Models\User;
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
    public function index(Request $request)
    {
        //
        $user = Auth::user();
        $perpage = 15;
        if(isset($request->perpage)){
            $perpage = $request->perpage;
        }
        $giftcards = Giftcard::where('user_id', $user->id)->orderBy('id','DESC')->paginate($perpage);
        if(isset($request->status)){
            $giftcards = Giftcard::where('user_id',$user->id)->where('status', $request->status)->orderBy('id','DESC')->paginate($perpage);
        }

        return $giftcards;

    }
    /*
     $table->string('code')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('redeemed_user_id')->nullable();
            $table->double('amount');
            $table->tinyInteger('status')->default(0);
     */


     public function redeem(Request $request)
     {
         $user= Auth::user();
         if($user){
            if(isset($request->code)){
                $gift = Giftcard::where('code', $request->code)->where('status',1)->first();
                if($gift){
                    $redeemuser = User::find($user->id);
                    $redeemuser->wallet += $gift->amount;
                    $redeemuser->save();
                    $gift->redeemed_user_id = $user->id;
                    $gift->status= 2;
                    $gift->save();
                    $gifter = User::find($gift->user_id);

                    return response()->json(['success' =>!!$gift,'redeemeduser'=>$redeemuser  ,'amount'=>$gift->amount, 'message'=>'Hello, '.$gift->name.'! You have successfully redemeed SAR '.$gift->amount . ' from '.$gifter->name.'.']);
                }
         return response()->json(['success' =>false,'message'=>'Gift card not available.']);

            }
         }
         
         return response()->json(['success' =>false,'message'=>'You are not authorized!']);
     }


    public function store(Request $request)
    {

        $user = Auth::user();
        $gift = new Giftcard();
        $code = Str::random(6);
        $gift->name = $request->name;
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
        if(isset($request->web)){
            $paygateway = $trans->createpayment($user, $request->amount, $gift->id, $gift->id, false, true);
            return response()->json(['success' => true, 'trans' => $paygateway, 'user' => $user, 'giftcard'=>$gift]);
        }
        $paygateway = $trans->createpayment($user, $request->amount, $gift->id, $gift->id, false, true);
        return response()->json(['success' => true, 'trans' => $paygateway, 'user' => $user, 'giftcard'=>$gift]);
    }
}
