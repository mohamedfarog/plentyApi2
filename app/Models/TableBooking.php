<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableBooking extends Model
{
    use HasFactory;
    protected $fillable = [
        'ref', 'date','wallet', 'preftime', 'table_id', 'status', 'amount_due','total_amount','coupon_value','points'
    ];
    public function details()
    {
        return $this->hasMany(TableBookingDetail::class,"tablebookingid");
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
