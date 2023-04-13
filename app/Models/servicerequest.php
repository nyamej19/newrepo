<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicerequest extends Model
{
    use HasFactory;

    protected $fillable =['service_id','time_of_service','chargeperhour','service_state','userrequestId' ,'email','phone','statement' ,'user_name'];

    public function user(){
        return $this->belongsTo('App\Model\User');
    }



}
