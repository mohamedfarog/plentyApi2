<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id', 'value', 'others','price', 'stocks', 'image'
    ];

   protected $appends = ['imgurl'];
   protected $hidden = ['image'];

   public function getImgurlAttribute()
   {
       if($this->image != null){
            return env('SIZEURL') . $this->image;
       }
   }
   public function color()
   {
       
    return $this->hasMany(Color::class);
   }
}
