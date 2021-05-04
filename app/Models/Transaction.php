<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Moathdev\Tap\Facades\Tap;

class Transaction extends Model
{
    use HasFactory;
    public function createpayment($user, $amount)
    {
        $user = Auth::user();
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
            'description' => 'Test Description',
            'statement_descriptor' => 'Sample',
            'metadata' => [
                'udf1' => 'test 1',
                'udf2' => 'test 2',
            ],
            'reference' => [
                'transaction' => 'txn_0001',
                'order' => 'ord_0001',
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
                'url' => 'http://your_website.com/post_url'
            ],
            'redirect' => [
                'url' => 'http://your_website.com/post_url'
            ]
        ]);
        
        return response()->json($res);
    }
}
