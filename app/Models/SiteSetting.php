<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{

	public function siteLogo(){
        return $this->hasOne(Media::class,'id','logo');
    }

    public function siteFavicon(){
        return $this->hasOne(Media::class,'id','favicon');
    }
   
}
