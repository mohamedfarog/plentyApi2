<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Logistics extends Model
{
    protected $baseUrl = "https://api.fastcoo-tech.com/API/";
    protected $secKey = "b30935-ed3572-8a183b-7df33c-0c1dd0";
    protected $customerId = "161913268122";
    protected $formate = "json";
    protected $method = "createOrder";
    protected $signMethod = "md5";
    use HasFactory;
    public function create($id)
    {
        $skudetails = array();
        $orderInfo = Order::with(['details' => function ($details) {
            return $details->with(['product' => function ($product) {
                return $product->with(['images']);
            }, 'size', 'color']);
        }, 'user'])->find($id);
        foreach ($orderInfo['details'] as $details) {
            $des = '';
            if ($details['size']) {
                $des .= 'size:' . $details['size']['value']."-";
            }
            if ($details['color']) {
                $des .= 'color:' . $details['color']['value'];
            }
            $data = array(
                "sku" => $details['product']["name_en"] . "/" . $details['product']["name_ar"],
                "description" => $des,
                "cod" => (int)$details['qty'] * (float)$details['price'],
                "piece" => $details['qty'],
                "weight" => "0.0",
            );
            array_push($skudetails, $data);
        }

        $param = array(
            'sender_name' => 'plentyofthing',
            'sender_email' => "info@plenty.com",
            'origin' => 'Jeddah',
            'sender_phone' => '',
            'sender_address' => 'Jeddah',
            'receiver_name' => $orderInfo['user']['name'],
            'receiver_phone' => $orderInfo['contact_number'],
            'destination' => $orderInfo['city'],
            'BookingMode' => $orderInfo['payment_method'] == "cash" ? 'COD' : "CC",
            'codValue' => $orderInfo['amount_due'],
            'receiver_address' => $orderInfo['label'] . ':' . $orderInfo['delivery_location'],
            'latitude' => $orderInfo['lat'],
            'longitude' => $orderInfo['lng'],
            'reference_id' => $orderInfo['ref'],
            'productType' => 'parcel',
            'description' => $orderInfo['delivery_note'],
            'service' => 3,
            'skudetails' =>
            $skudetails
        );
        $sign = $this->create_sign($param, $this->secKey, $this->customerId, $this->formate, $this->method, $this->signMethod);
        $data_array = array(
            "sign" => $sign,
            "format" => $this->formate,
            "signMethod" => $this->signMethod,
            "param" => $param,
            "method" => $this->method,
            "customerId" => $this->customerId,
        );
        $dataJson = json_encode($data_array);

        $headers = array(
            "Content-type: application/json",
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $this->baseUrl . "createOrder");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataJson);
        $response = curl_exec($ch);
        $response = json_decode($response);
        if ($response->status == 200) {
            $orderInfo->aws_no = $response->aws_no;
            $orderInfo->save();
            return ($response->aws_no);
        }
        return null;
    }
    function create_sign($param, $secKey, $customerId, $formate, $method, $signMethod)
    {

        $jsonDataArray = json_encode($param);

        $var = "customerId" . $customerId . "format" . $formate . "method" . $method . "signMethod" . $signMethod . "";
        $all_var_concatinated = $secKey . $var . $jsonDataArray . $secKey;
        $sign = strtoupper(md5($all_var_concatinated));
        return $sign;
    }
    function find($awsNo){
       $response= Http::asForm()->post($this->baseUrl."trackShipmentFm",["awb"=>$awsNo]);
       return json_decode($response); 
    }
}
