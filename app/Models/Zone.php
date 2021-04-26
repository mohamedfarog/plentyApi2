<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_en', 'name_ar', 'shop_id',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
