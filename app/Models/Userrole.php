<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userrole extends Model
{
    use HasFactory;

    public function rolescreens()   
    {
        return $this->hasMany(Role::class,'id','role_id');
    }
}
