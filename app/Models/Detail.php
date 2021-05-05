<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id', 'qty', 'timeslot_id', 'shop_id', 'order_id', 'price', 'color_id', 'addons', 'size_id', 'booking_date', 'booking_time', 'status'

    ];
    protected $casts = [
        'status' => 'integer'
    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class,'size_id','id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function addons()
    {
        return $this->hasMany(Addon::class);
    }
}
