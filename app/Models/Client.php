<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Client extends Model
{

    use HasFactory,SoftDeletes;
    use LogsActivity;
    protected $table = 'clients';

    public function media(){
        return $this->hasOne(Media::class,'id','media_id');
    }

     public function plates(){
        return $this->hasMany(ClientPlate::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('Client')
        ->setDescriptionForEvent(fn(string $eventName) => "Client has been {$eventName}")
        ->logOnly(['*']);
        // Chain fluent methods for configuration options
    }
}
