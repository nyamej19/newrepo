<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userassesment extends Model
{
    use HasFactory;

    protected $fillable = ['assesment' , 'worker_id'];


    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }
}
