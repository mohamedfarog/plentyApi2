<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'ref', 'total_amount', 'amount_due', 'order_status', 'payment_method', 'tax', 'delivery_charge', 'delivery_location', 'user_id',
    ];
}
