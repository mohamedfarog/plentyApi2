<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rolescreen extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'create_permission', 'read_permission', 'update_permission', 'delete_permission', 'role_id',
    ];
}
