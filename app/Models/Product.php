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

    protected $appends = ['relatedproducts', 'producttags'];
    protected $casts = ['id'=>'integer'];
    protected $hidden = ['tags'];

    public function getRelatedProductsAttribute()
    {
        if($this->shop_id == 12 && $this->designer_id != null){
            $tags = $this->tags->pluck('tag_id')->toArray();

            // $tags = Productag::where('product_id', $this->id)->pluck('tag_id')->toArray();

            $products = Productag::whereIn('tag_id', $tags)->where('product_id','!=',$this->id)->orderBy('total', 'desc')->selectRaw('product_id, count(*) as total')
            ->groupBy('product_id')
            ->pluck('total','product_id')->toArray();
            $productsarray = array();
            foreach ($products as $key => $value) {
                array_push($productsarray, $key);
            }
            // return $productsarray;
            return self::find(378);
            // return self::whereIn('id',$productsarray)->with(['sizes' => function ($sizes) {
            //     return $sizes->with(['color']);
            // }, 'colors', 'addons', 'images', 'designer'])->get();
        }

       
    }

    public function getProductTagsAttribute()
    {
        if($this->shop_id == 12 && $this->designer_id != null){
            // $tags = Productag::where('product_id', $this->id)->pluck('tag_id')->toArray();
        return $this->tags->pluck('tag');
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
