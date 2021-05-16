<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'ref', 'total_amount', 'amount_due', 'order_status', 'points_earned', 'payment_method', 'tax', 'delivery_charge', 'delivery_location', 'user_id', 'coupon_value', 'lat', 'lng', 'delivery_note', 'contact_number', 'city', 'label', "booking_time"
    ];
    protected $appends = ['orderstatusvalue', 'prepstatus', 'orderreceipt'];
    public function details()
    {
        return $this->hasMany(Detail::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getPrepstatusAttribute()
    {
        $details = Detail::where('order_id', $this->id)->pluck('status')->toArray();
        $status = "No Order Details";
        if (count($details) > 0) {
            switch ($this->order_status) {
                case 0:
                    $status = "Pending";
                    break;
                case 1:
                    if (count($details) > 0) {
                        $status = "Ready for Shipment";
                        if (in_array(0, $details)) {
                            $status = "Preparing";
                        }
                    }
                    break;
                case 2:
                    $status = "Out for Delivery";
                    break;
                case 3:
                    $status = "Delivered";
                    break;
                case 4:
                    $status = "Rejected";
                    break;
                default:
                    # code...
                    break;
            }
        }


        return $status;
    }
    public function getOrderreceiptAttribute()
    {

        return  ENV('PROJECTURL') . 'orderreceipt?order_id=' . $this->id;
    }

    public function getOrderstatusvalueAttribute()
    {
        switch ($this->order_status) {
            case '0':
                return "Pending";
                break;
            case '1':
                return "Preparing";
                break;
            case '2':
                return "Out for Delivery";
                break;
            case '3':
                return "Delivered";
                break;
            case '4':
                return "Rejected";
                break;
            case '99':
                return "Payment Pending";
                break;
            case '98':
                return "Payment Pending";
                break;

            default:
                return "Unknown";
                break;
        }
    }
}
