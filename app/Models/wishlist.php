<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wishlist extends Model
{
    use HasFactory;

    protected $fillable = ['price', 'homeImg', 'homeVid', 'location', 'detailDesc', 'homeType', 'summDesc', 'saleType', 'availability'];


    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }
}
