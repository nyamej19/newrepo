<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class workerassesment extends Model
{
    use HasFactory;

    protected $fillable = ['assesment', 'solicitant_id'];


    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }
}
