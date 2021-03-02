<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id', 'value', 'others','price'
    ];

    protected $hidden = ['created_at', 'updated_at','url'];

    public function getImgurlAttribute()
    {
        if($this->url != null){
            return env('PRODUCTURL').$this->url;
        }
    }
}
