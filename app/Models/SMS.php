<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class SMS
{
    public static function sendSms($recipient, $body='')
    {
        $response = Http::post("http://basic.unifonic.com/rest/SMS/messages", [
            'AppSid' => env('APPSID'),
            'SenderID' => env('SENDERID'),
            'Body' => $body,
            'Recipient' => $recipient
        ]);

        if($response['success'] == true){
            return 'An OTP was sent to +' . $recipient.'.';
        }else{
            return 'Please enter a valid KSA phone number.';
        }
    }
}
