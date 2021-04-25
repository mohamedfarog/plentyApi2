<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EjackController extends Controller
{
    protected $baseUrl = "https://ejack.fastcoo-solutions.com/lm/";
    protected $username = 'ejack@plentyofthing.com';
    protected $password = "Ejack@123123";



    public function create(Request $request)
    {
        $res = Http::get($this->baseUrl . "shipmentBookingApi_lm.php?sender_name=test&sender_city=Riyadh&sender_mobile=966540502164&sender_address=Alsulay,Istanbulst.,Almashael,warehouseno&productType=KVAIMI&service=4&password=$this->password&sender_email=$this->username&Receiver_name=test&Receiver_email=ravi@gmail.com&Receiver_address=test&Receiver_phone=96645678945&Reciever_city=Riyadh&Weight=5&Description=test&NumberOfParcel=1&BookingMode=COD&codValue=200&refrence_id=21124&product_price=100");
        return $res;
    }
    public function cancel($aws_no = null)
    {

        $res = Http::get($this->baseUrl . "cancelShipmentApi.php?user_name=$this->username&awb_no=$aws_no&password=$this->password");
        return $res;
    }
}
