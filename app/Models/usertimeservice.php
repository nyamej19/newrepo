<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usertimeservice extends Model
{

    use HasFactory;
    protected $fillable = ['worker_id', 'timespent','amount_to_be_paid'];

    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }
}
