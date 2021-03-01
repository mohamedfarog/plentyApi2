<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_en', 'name_ar', 'desc_en', 'desc_ar', 'img',
    ];

    protected $appends = [
        'imgurl'
    ];
    protected $hidden = ['created_at', 'updated_at', 'img'];

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }

    public function getImgurlAttribute()
    {
        if ($this->img != null) {
            return env('CATURL') . $this->img;
        }
    }
}
