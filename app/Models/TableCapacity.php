<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableCapacity extends Model
{
    use HasFactory;
    protected $appends = ['imageurl'];
    public function getImageurlAttribute()
    {
        if ($this->image != null) {
            return env('PRODUCTURL') . $this->image;
        }
    }


}
