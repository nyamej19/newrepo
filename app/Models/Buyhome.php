<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyhome extends Model
{
    use HasFactory;

    protected $fillable = ['price' ,'name' ,'email' ,'phone','paymentType' ,'availability' ,'homeId'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
