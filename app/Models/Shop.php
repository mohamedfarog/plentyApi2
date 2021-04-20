<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table="shops";
    use HasFactory;
    protected $fillable = [
        'name_en', 'name_ar', 'desc_en', 'desc_ar', 'cat_id', 'active', 'status',
    ];
    protected $hidden = ['created_at', 'updated_at'];
    protected $appends = ['popularitems'];
    public function cat()
    {
        return $this->belongsTo(Cat::class);
    }

    public function style()
    {
        return $this->hasOne(Style::class);
    }
    public function designers()
    {
        return $this->hasMany(Designer::class);
    }

    public function getPopularitemsAttribute()
    {
        return Product::with(['sizes', 'colors', 'addons', 'images', 'designer'])->where('shop_id', $this->id)->orderBy('sales', 'desc')->limit(10)->get();
    }
}
