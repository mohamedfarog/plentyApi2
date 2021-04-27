<?php

namespace App\Http\Controllers;

use App\Models\Logistics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EjackController extends Controller
{
    protected $baseUrl = "https://api.fastcoo-tech.com/API/";
    protected $username = 'ejack@plentyofthing.com';
    protected $password = "Ejack@123123";



    public function create(Request $request, $orderId)
    {
        return (new Logistics())->create($orderId);
    }
    function create_sign($param, $secKey, $customerId, $formate, $method, $signMethod)
    {

        $jsonDataArray = json_encode($param);

        $var = "customerId" . $customerId . "format" . $formate . "method" . $method . "signMethod" . $signMethod . "";
        $all_var_concatinated = $secKey . $var . $jsonDataArray . $secKey;
        $sign = strtoupper(md5($all_var_concatinated));
        return $sign;
    }
    public function cancel($aws_no = null)
    {

        $res = Http::get($this->baseUrl . "cancelShipmentApi.php?user_name=$this->username&awb_no=$aws_no&password=$this->password");
        return $res;
    }
}
