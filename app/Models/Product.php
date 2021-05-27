<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_en', 'name_ar','eventcat_id', 'desc_en', 'desc_ar', 'price', 'offerprice', 'isoffer', 'stocks', 'shop_id', 'prodcat_id', 'sales', 'designer_id'
    ];

    protected $appends = ['relatedproducts'];
    protected $casts = ['id'=>'integer'];

    public function getRelatedProductsAttribute()
    {
        if($this->shop_id == 12 && $this->designer_id != null){
            $tags = $this->tags->pluck('tag_id')->toArray();

            $products = Productag::whereIn('id', $tags)->get();
            return  $products;
        }

       
    }


    public function sizes()
    {
        return $this->hasMany(Size::class);
    }

    public function addons()
    {
        return $this->hasMany(Addon::class);
    }

    public function colors()
    {
        return $this->hasMany(Color::class);
    }

    public function designer()
    {
        return $this->belongsTo(Designer::class);
    }
    public function shop()
    {
        return $this->hasOne(Shop::class, 'id','shop_id');
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function tags()
    {
        return $this->hasMany(Productag::class);
    }

    
}
