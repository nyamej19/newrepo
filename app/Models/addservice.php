<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addservice extends Model
{
    use HasFactory;
    protected $fillable =['Name' ,'Desc' ,'service_charge'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
