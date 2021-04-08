<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventcat extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'event_id', 'image',
    ];
}
