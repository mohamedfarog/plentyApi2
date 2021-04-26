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
        return $this->hasone(Product::class);
    }
}
