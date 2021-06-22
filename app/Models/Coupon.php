<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{   
    protected $appends = ['expired','shopname'];
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
                return 'Active';
            }
        }
    }

    
    public function getShopnameAttribute(){
        if(request('getshops')!=''){
            if($this->shop_id!=null){
                if($this->shop_id == 0){
                    return 'Plenty Bazaar';
                }
            $shop = Shop::find($this->shop_id);
                return $shop->name_en;
            }else{
                return 'All Shops';
            }
        }
    }

    use HasFactory;
}
