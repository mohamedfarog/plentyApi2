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
    protected $hidden = ['created_at', 'updated_at',];
    protected $casts = ['create_permission' => 'boolean', 'read_permission' => 'boolean', 'update_permission' => 'boolean', 'delete_permission' => 'boolean'];
}
