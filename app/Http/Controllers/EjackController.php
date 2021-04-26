<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EjackController extends Controller
{
    protected $baseUrl = "https://api.fastcoo-tech.com/API/";
    protected $username = 'ejack@plentyofthing.com';
    protected $password = "Ejack@123123";



    public function create(Request $request)
    {
        $secret="b30935-ed3572-8a183b-7df33c-0c1dd0";
        $customerId="161913268122";
        $parms = [
            "sender_name" => "fastcoo",
            "sender_email" => "test@email.com",
            "origin" => "Riyadh",
            "sender_phone" => "9876543210",
            "sender_address" => "riyadh",
            "receiver_name" => "test",
            "receiver_phone" => "0500000000",
            "destination" => "Riyadh",
            "BookingMode" => "COD",
            "receiver_address" => "Near Tower",
            "reference_id" => "TRL6578175952",
            "codValue" => "150.00",
            "productType" => "parcel",
            "service" => "3",
            "skudetails" => [
                [
                    "sku" => "band1",
                    "description" => "TEST DESCRIPTION",
                    "cod" => 299.00,
                    "piece" => 1,
                    "wieght" => 12,
                ]
            ]
        ];

        $data = [
            "customerId" => $customerId,
            "method" => " createOrder",
            "format" => "json",
            "secret_key"=>$secret,
            "signMethod" => "md5",
        ];
        $data['sign'] = strtoupper(md5($secret."customerId161913268122formatjsonmethodcreateOrdersignMethodmd5" . json_encode($parms) .$secret));

        $data["param"] = json_encode($parms);
        $res = Http::post($this->baseUrl . "createOrder", $data);
        return $res;
    }
    public function cancel($aws_no = null)
    {

        $res = Http::get($this->baseUrl . "cancelShipmentApi.php?user_name=$this->username&awb_no=$aws_no&password=$this->password");
        return $res;
    }
}
