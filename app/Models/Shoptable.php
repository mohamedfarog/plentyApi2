<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shoptable extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_en', 'name_ar', 'desc_ar', 'desc_en', 'capacity', 'shop_id', 'zone_id',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
}
