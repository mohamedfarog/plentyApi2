<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productag extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id', 'tag_id', 'active', 'deleted_at',
    ];

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
