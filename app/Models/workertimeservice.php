<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class workertimeservice extends Model
{
    use HasFactory;
    protected $fillable = ['userrequestid', 'timespent', 'amount_to_be_paid'];

    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }
}
