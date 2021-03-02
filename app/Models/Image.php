<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'url',
    ];

    protected $hidden = ['created_at', 'updated_at', 'url'];
    protected $appends = ['imgurl'];
    public function getImgurlAttribute()
    {
        if ($this->url != null) {
            return env('PRODUCTURL') . $this->url;
        }
    }
}
