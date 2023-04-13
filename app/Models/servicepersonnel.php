<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicepersonnel extends Model
{
    use HasFactory;
    protected $fillable = ['name' ,'email' ,'password' ,'phone','profileImg','availability'];

    public function service(){
        return $this->belongsTo('App\Models\service');
    }
    public function serviceRequest(){
        return $this->hasMany('App\Models\myrequests');
    }
}
