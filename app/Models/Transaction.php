<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Moathdev\Tap\Facades\Tap;

class Transaction extends Model
{
    use HasFactory;
    public function createpayment($user, $amount,$orderid,$transid,$web=false)
    {   

        Mail::send('datadata', ['data' => ['user'=>$user, 'amount'=>$amount, 'orderid'=>$orderid,'transid'=>$transid,'web'=>$web]], function ($m) {
            $m->from('mohammed@mvp-apps.ae', 'PLENTY WALLET TEST');

            $m->to('abubakar@mvp-apps.ae')->subject(`'PLENTY WALLET TEST`);
        });
        
        // $user = Auth::user();
        $firstname='';
        $lastname='';
        if(str_contains($user->name,' ')){
            $firstname= explode(' ', $user->name)[0];
            $lastname= explode(' ', $user->name)[0];
        }
        else{
            $firstname= $user->name;
            $lastname=  $user->name;
        }
        $phonenumber= substr($user->contact, 4,12);
        $res  = Tap::createCharge([
            'amount'=> $amount,
            'currency' => 'SAR',
            'threeDSecure' => true,
            'save_card' => false,
            'description' => 'Payment',
            'statement_descriptor' => 'Sample',
            'metadata' => [
                'udf1' => 'test 1',
                'udf2' => 'test 2',
            ],
            'reference' => [
                'transaction' => $transid,
                'order' => $orderid,
            ],
            'receipt' => [
                'email' => false,
                'sms' => false,
            ],
            'customer' => [
                'first_name' => $firstname,
                'middle_name' => ".",
                'last_name' => $lastname,
                'email' => $user->email,
                'phone' => [
                    'country_code' => "966",
                    'number' => $phonenumber,
                ],
            ],
            'merchant' => [
                'id' => '7818740'
            ],
            'source' => [
                'id' => 'src_all',
            ],
            'post' => [
                'url' => $web? 'https://plentyapp.mvp-apps.ae/success'  :'https://plentyapp.mvp-apps.ae/api/success'
            ],
            'redirect' => [
                'url' => $web? 'https://plentyapp.mvp-apps.ae/success'  :  'https://plentyapp.mvp-apps.ae/api/success'
            ]
        ]);
        
        return response()->json($res);
    }
}
