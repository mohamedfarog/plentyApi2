<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_en', 'name_ar', 'desc_en', 'desc_ar',
    ];

    protected $hidden = ['created_at', 'updated_at',];

    public function screens()
    {
        return $this->hasMany(Rolescreen::class);
    }
}
