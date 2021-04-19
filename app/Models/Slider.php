<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $casts = [
        'isactive' => 'boolean',
        "shop_id"=>"integer"
    ];
    public function shop()
    {
        return $this->hasOne(ShopInfo::class,'id','shop_id');
    }

}
