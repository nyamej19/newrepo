<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class serviceass extends Model
{
    use HasFactory;

    protected $fillable = ['mode-of-conduct','service-satisfaction','time-report','service-state','service-personId'];

    public function user(){
        return $this->belongsTo('App\Model\User');
    }

    
}
