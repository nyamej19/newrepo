<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'image',
        'agree',
        'country',
        'state',
        'profile_photo_path'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
    public function service(){
        return $this->hasMany('App\Models\service');
    }
    public function serviceRequest(){
        return $this->hasMany('App\Models\servicerequest');
    }
    public function wishlist(){
        return $this->hasMany('App\Models\wishlist');
    }
    public function usertimeservice(){
        return $this->hasMany('App\Models\usertimeservice');
    }
    public function workertimeservice()
    {
        return $this->hasMany('App\Models\workertimeservice');
    }
    public function userassesment()
    {
        return $this->hasMany('App\Models\userassesment');
    }
    public function workerassesment()
    {
        return $this->hasMany('App\Models\workerassesment');
    }
}
