<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{


    public function hasAccess($permission) :bool
    {
        if ($this->hasPermission($permission)){
            return true;
        }
        return false;
    }
    private function hasPermission($permission) 
    {
        return $this->hasOne(RolePermission::class)->whereIn('permission_key',$permission)->exists();
    }
    public function permissions(){
        return $this->hasOne(RolePermission::class);
    }
}
