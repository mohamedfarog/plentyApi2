<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    use HasFactory;
    protected $fillable = [
        'primary', 'secondary', 'posterimg', 'brandheader', 'backgroundimg', 'banner', 'backgroundvid', 'shop_id', 'textcolor1', 'textcolor2', 'textcolor3', 'textcolor4',
    ];

    protected $appends = [
        'poster',
        'header',
        'bg',
        'bannerimg',
        'bgvid',
    ];

    protected $hidden = ['created_at', 'updated_at', 'posterimg', 'brandheader', 'backgroundimg', 'banner','backgroundvid'];

    public function getPosterAttribute()
    {
        if($this->posterimg != null){
            return env('STYLEURL').$this->posterimg;
        }
    }
    public function getHeaderAttribute()
    {
        if($this->brandheader != null){
            return env('STYLEURL').$this->brandheader;
        }
    }
    public function getBgAttribute()
    {
        if($this->backgroundimg != null){
            return env('STYLEURL').$this->backgroundimg;
        }
    }
    public function getBannerimgAttribute()
    {
        if($this->banner != null){
            return env('STYLEURL').$this->banner;
        }
    }
    public function getBgvidAttribute()
    {
        if($this->backgroundvid != null){
            return env('STYLEURL').$this->backgroundvid;
        }
    }
}
