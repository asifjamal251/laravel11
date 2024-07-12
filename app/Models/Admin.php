<?php

namespace App\Models;

use App\Models\Role;
use App\Notifications\AdminResetPasswordNotification;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable,SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guard = 'admin';
    protected $dates = ['date_of_birth'];
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *  
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->hasOne(Role::class,'id','role_id');
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users');
    }
    //  public function hasAccess(string $permissions) :bool
    // {
    //     if($this->role->hasAccess($permissions)) {
    //         return true;
    //     }
    //     return false;
    // }


     public function hasAccess($permissions) :bool
    {
        $permissions = gettype($permissions) == 'array' ? $permissions : [$permissions];
        if($this->role->hasAccess($permissions)) {
            return true;
        }
        return false;
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }


  

}
