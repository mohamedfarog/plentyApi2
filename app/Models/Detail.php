<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id', 'qty', 'shop_id', 'order_id', 'price', 'color_id', 'addons', 'size_id', 'booking_date', 'booking_time',
    ];
}
