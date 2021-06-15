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
        'roles',
        'activeroles'
    ];

    public function getRolesAttribute()
    {
        if ($this->typeofuser != "U") {
            $ids = Userrole::where('user_id', $this->id)->pluck('role_id')->toArray();
            $rolearr = array();
            if (count($ids) > 0) {
                foreach ($ids as $id) {
                    $role = Role::with(['screens'])->find($id);
                    foreach ($role->screens as $screen) {
                        if (array_key_exists($screen->name, $rolearr)) {
                            $create = $rolearr[$screen->name]['create_permission'];
                            $read = $rolearr[$screen->name]['read_permission'];
                            $update = $rolearr[$screen->name]['update_permission'];
                            $delete = $rolearr[$screen->name]['delete_permission'];

                            $updcreate = false;
                            $updread = false;
                            $updupdate = false;
                            $upddelete = false;
                            if ($create || $screen->create_permission) {
                                $updcreate = true;
                            }if ($read || $screen->read_permission) {
                                $updread = true;
                            }if ($update || $screen->update_permission) {
                                $updupdate = true;
                            }if ($delete || $screen->delete_permission) {
                                $upddelete = true;
                            }

                            $rolearr[$screen->name] = [
                                "create_permission" => $updcreate,
                                "read_permission" => $updread,
                                "update_permission" => $updupdate,
                                "delete_permission" => $upddelete,
                                "rank"=>$screen->rank
                            ];
                        } else {
                            $rolearr[$screen->name] = [
                                "create_permission" => $screen->create_permission,
                                "read_permission" => $screen->read_permission,
                                "update_permission" => $screen->update_permission,
                                "delete_permission" => $screen->delete_permission,
                                "rank"=>$screen->rank
                            ];
                        }
                    }
                }
            }
            return $rolearr;
        }
    }public function getActiverolesAttribute()
    {
        if ($this->typeofuser != "U") {
            $ids = Userrole::where('user_id', $this->id)->pluck('role_id')->toArray();
            $rolearr = array();
            if (count($ids) > 0) {
                foreach ($ids as $id) {
                    $role = Role::with(['screens'])->find($id);
                    $rolearr[$role->name_en] = $role->desc_en;
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
