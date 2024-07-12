<?php

namespace App\Models;

use App\Models\Role;
use App\Notifications\AdminResetPasswordNotification;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use ALajusticia\Logins\Traits\HasLogins;
use Illuminate\Support\Facades\Log;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasLogins;
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

    // protected function google2faSecret(): Attribute
    // {
    //     return new Attribute(
    //         get: fn ($value) =>  decrypt($value),
    //         set: fn ($value) =>  encrypt($value),
    //     );
    // }



    // protected function google2faSecret(): Attribute{
    //     return new Attribute(
    //         get: function ($value) {
    //             try {
    //                 $decryptedValue = decrypt($value);
    //                 Log::info('Decrypted value:', ['value' => $decryptedValue]);
    //                 return $decryptedValue;
    //             } catch (\Exception $e) {
    //                 Log::error('Decryption failed:', ['error' => $e->getMessage()]);
    //                 return null;
    //             }
    //         },
    //         set: function ($value) {
    //             $encryptedValue = encrypt($value);
    //             Log::info('Encrypted value:', ['value' => $encryptedValue]);
    //             return $encryptedValue;
    //         }
    //     );
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
