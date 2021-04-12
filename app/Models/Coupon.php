<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{   
    public function shop()
    {
        return $this->hasOne(Shop::class,'id','shop_id');
    }


    use HasFactory;
}
