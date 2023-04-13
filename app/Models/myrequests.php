<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class myrequests extends Model
{
    use HasFactory;

    protected $fillable =['service_id','time-of-service','chargeperhour','service-state' ,'email','phone'];

   
    public function servicepersonnel(){
        return $this->belongsTo('App\Model\servicepersonnel');
    }
}
