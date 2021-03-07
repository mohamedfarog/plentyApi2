<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_en', 'name_ar', 'desc_en', 'desc_ar', 'price', 'offerprice', 'isoffer', 'stocks', 'shop_id', 'prodcat_id', 'sales', 'designer_id'
    ];

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



    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
