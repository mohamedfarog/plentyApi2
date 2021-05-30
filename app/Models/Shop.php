<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = "shops";
    use HasFactory;
    protected $fillable = [
        'name_en', 'name_ar', 'desc_en', 'desc_ar', 'cat_id', 'active', 'status',
    ];
    protected $hidden = ['created_at', 'updated_at'];
    protected $appends = ['popularitems', 'earnings'];
    protected $casts = ['id' => 'integer'];
    public function cat()
    {
        return $this->belongsTo(Cat::class);
    }

    public function getEarningsAttribute()
    {
        $earnings =   floatval(Order::join('details', 'orders.id', '=', 'details.order_id')->where('details.shop_id', $this->id)->where('order_status', 3)->sum('details.price'));
        if ($this->cat_id == 1) {
            $earnings =  floatval(TableBooking::join('table_booking_details', 'table_bookings.id', '=', 'table_booking_details.tablebookingid')->where('table_booking_details.shop_id', $this->id)->where('status', 3)->whereNull('date')->sum('table_bookings.total_amount'));
        }
        return $earnings;
    }

    public function style()
    {
        return $this->hasOne(Style::class);
    }
    public function designers()
    {
        return $this->hasMany(Designer::class);
    }

    public function getPopularitemsAttribute()
    {
        return Product::with(['sizes', 'colors', 'addons', 'images', 'designer'])->where('shop_id', $this->id)->orderBy('sales', 'desc')->limit(10)->get();
    }
}
