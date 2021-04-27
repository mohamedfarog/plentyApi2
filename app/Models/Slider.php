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
    protected $hidden=['created_at', 'updated_at','url','arabicurl'];
    protected $appends = ['imgurl','arabicimgurl'];
    public function shop()
    {
        return $this->hasOne(ShopInfo::class,'id','shop_id');
    }
    public function getImgurlAttribute()
    {
        if ($this->url != null) {
            return "https://plentyapp.mvp-apps.ae/storage/slider/". $this->url;
        }
    }
    public function getArabicimgurlAttribute()
    {
        if ($this->arabicurl != null) {
            return "https://plentyapp.mvp-apps.ae/storage/slider/". $this->arabicurl;
        }
    }
}
