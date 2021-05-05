<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shoptable extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_en', 'name_ar', 'desc_ar', 'desc_en', 'capacity', 'shop_id', 'zone_id',
    ];

    protected $appends = [
        "booking"
    ];

    public function getBookingAttribute()
    {
        $schedule = SchedTime::with([
            'tblbooking' => function ($booking) {
                return $booking->with(['user']);
            }
        ])->where('table_id', request('fromtime'))->where('shop_id', $this->shop_id)->first();
        return $schedule->tblbooking;
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function timeslots()
    {
        return $this->hasMany(SchedTime::class, 'table_id', 'id');
    }
}
