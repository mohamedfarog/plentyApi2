<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tablesched extends Model
{
    use HasFactory;
    protected $fillable = [
        'day', 'date', 'seating_time', 'opening', 'closing', 'shop_id',
    ];
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
    
}
