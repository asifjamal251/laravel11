<?php
namespace App\Models;
use \Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
	public $timestamps = false;
	public function permission(){
		return $this->belongsTo(Permission::class,'permission_id','id');
	}
	
	
}