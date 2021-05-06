<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{   
    protected $appends = ['expired'];
    public function shop()
    {
        return $this->hasOne(Shop::class,'id','shop_id');
    }
    public function getExpiredAttribute()
    {
        if ($this->expiry != null) {
            if(now()->gte($this->expiry)) {
                return 'Expired';
            }
            else{
                return $this->expiry->format('d M Y');
            }
        }
    }

    


    use HasFactory;
}
