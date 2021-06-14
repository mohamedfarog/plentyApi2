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
        'tier_id',
        'bday'
    ];

    protected $appends = [
        'loyaltypass',
        'accesspass',
        'age',
        'roles'
    ];

    public function getRolesAttribute()
    {
        if($this->typeofuser !="U"){
            $ids = Userrole::where('user_id', $this->id)->pluck('role_id')->toArray();
            $rolearr = array();
            if(count($ids) > 0){
                foreach($ids as $id){
                    $role = Role::with(['screens'])->find($id);
                    $rolearr[$role->name] = $role->screens;
                }
            }

            return $rolearr;
        }
    }

    public function getAgeAttribute()
    {
        return $this->bday != null ? intval(\Carbon\Carbon::parse($this->bday)->diff(\Carbon\Carbon::now())->format('%y')) : -1;
    }

    public function tier()
    {
        return $this->belongsTo(Tier::class);
    }


    public function getLoyaltypassAttribute()
    {
        if ($this->loyaltyidentifier) {
            return env('PASSURL') . $this->loyaltyidentifier;
        }
    }
    public function getAccesspassAttribute()
    {
        if ($this->accessidentifier) {
            return env('PASSURL') . $this->accessidentifier;
        }
    }
    public function shop()
    {
        return $this->belongsTo(Shop::class, 'id', 'user_id');
    }
    public function designer()
    {
        return $this->belongsTo(Designer::class, 'id', 'user_id');
    }

    public function roles()
    {
        return $this->hasMany(Userrole::class);
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
