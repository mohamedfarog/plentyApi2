<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'ref', 'total_amount', 'amount_due', 'order_status', 'payment_method', 'tax', 'delivery_charge', 'delivery_location', 'user_id', 'coupon_value', 'lat', 'lng', 'delivery_note', 'contact_number', 'city', 'label'
    ];
    protected $casts = [
        'updated_at'  =>'datetime',
        'created_at' => 'datetime:Y-m-d H:00',
    ];
    protected $appends = ['orderstatusvalue'];
    public function details()
    {
        return $this->hasMany(Detail::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getOrderstatusvalueAttribute()
    {
        switch ($this->order_status) {
            case '0':
                return "Confirmed";
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

            default:
                return "Unkown";
                break;
        }
    }
}
