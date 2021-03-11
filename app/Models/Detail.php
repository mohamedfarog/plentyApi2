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
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function color()
    {
        return $this->hasOne(Color::class);
    }

    public function size()
    {
        return $this->hasOne(Size::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class);
    }

    
}
