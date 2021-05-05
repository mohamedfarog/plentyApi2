<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableBookingDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'addons', 'tablebookingid', 'addonid', 'size_id', 'qty', 'shop_id','price'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

 
    public function addons()
    {
        return $this->hasMany(Addon::class);
    }

}
