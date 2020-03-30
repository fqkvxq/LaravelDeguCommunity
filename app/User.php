<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'twitter_id',
        'twitter_unique_id',
        'profile_image_url',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Deguモデルとのリレーション(Degu:User = N:1)
    public function degus(){
        return $this->hasMany('App\Degu');
    }

    // Questionモデルとのリレーション(Question:User = N:1)
    public function questions(){
        return $this->hasMany('App\Question');
    }

    public function answers(){
        return $this->hasMany('App\Answer');
    }
}