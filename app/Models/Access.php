<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    use HasFactory;

    protected $fillable = [
        'inviter_id', 'invitee_id', 'invcode',
    ];

    public function invitee()
    {
        return $this->belongsTo(User::class);
    }
    public function inviter()
    {
        return $this->belongsTo(User::class);
    }
}
