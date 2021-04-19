<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventcat extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_en', 'name_ar', 'image', 'event_id',
    ];
    protected $appends = [
        'imgurl',
        
    ];

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }
    public function getImgurlAttribute()
    {
        if ($this->image != null) {
            return env('CATURL') . $this->image;
        }
    }
}
