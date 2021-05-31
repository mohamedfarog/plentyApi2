<?php

namespace App\Http\Controllers;

use App\Models\Giftcard;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class GifttransController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         Mail::send('datadata', ['data' => $request->all()], function ($m) {
            $m->from('mohammed@mvp-apps.ae', 'PLENTY WALLET TEST');

            $m->to('mohammed@mvp-apps.ae')->subject(`'PLENTY WALLET TEST`);
        });
        return view('giftcardsuccess')->with(['data'=>'Cash']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        Mail::send('datadata', ['data' => $request->all()], function ($m) {
            $m->from('mohammed@mvp-apps.ae', 'PLENTY WALLET TEST');

            $m->to('mohammed@mvp-apps.ae')->subject(`'PLENTY WALLET TEST`);
        });
        
        
        $orderid=$request['reference']['order'];
        $transactionid=$request['reference']['transaction'];
        $status=$request['acquirer']['response']['message'];
        if($status=='Approved'){
            if($orderid!= null){
                $transaction= Giftcard::find($transactionid);
                $transaction->status=1;
                $transaction->save();
                
            }
        }
        else{
            Giftcard::find($transactionid)->delete();
            // $transaction= Transaction::find($transactionid);
            // $user= User::find($transaction->user_id);
            // $user->wallet+= $transaction->amount;
            // $user->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
