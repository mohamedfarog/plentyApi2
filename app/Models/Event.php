<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_en', 'name_ar', 'desc_en', 'desc_ar', 'image', 'video', 'start', 'end',
    ];


    protected $appends = [
        'imgurl',
        'bgurl'
    ];

    protected $hidden = ['created_at', 'updated_at', 'image', 'video'];

    public function categories()
    {
        return $this->hasMany(Eventcat::class);
    }

    public function getImgurlAttribute()
    {
        if ($this->img != null) {
            return env('CATURL') . $this->img;
        }
    }

    public function getBgurlAttribute()
    {
        if($this->backgroundvid != null){
            return env('CATURL').$this->backgroundvid;
        }
    }
}
