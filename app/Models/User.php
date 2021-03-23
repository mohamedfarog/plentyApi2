<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'contact',
        'eid',
        'passport',
        'others',
        'apple_id',
        'google_id',
        'active',
        'verified',
        'typeofuser',
        'gender',
        'invitation_code',
        'invites',
        'points',
        'totalpurchases',
        'tier_id'
    ];

    protected $appends = [
        'loyaltypass',
        'accesspass'
    ];



    public function getLoyaltypassAttribute()
    {
        if($this->loyaltyidentifier){
            return env('PASSURL'). $this->loyaltyidentifier;
        }
    }
    public function getAccesspassAttribute()
    {
        if($this->accessidentifier){
            return env('PASSURL'). $this->accessidentifier;
        }
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
