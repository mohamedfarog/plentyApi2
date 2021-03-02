<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_en', 'name_ar', 'desc_en', 'desc_ar', 'cat_id', 'active', 'status',
    ];
    protected $hidden = ['created_at', 'updated_at'];

    public function cat()
    {
        return $this->belongsTo(Cat::class);
    }

    public function style()
    {
        return $this->hasOne(Style::class);
    }

    public static function popularitems($id)
    {
        return Product::where('shop_id', $id)->orderBy('sales', 'desc')->get();
    }
}
