<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableBooking extends Model
{
    use HasFactory;
    protected $fillable = [
        'ref', 'date', 'preftime', 'table_id', 'status', 'amount_due','total_amount','coupon_value','points'
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
