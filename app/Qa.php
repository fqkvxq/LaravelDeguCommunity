<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qa extends Model
{
    //
    protected $table = 'qas';

    // Userモデルとのリレーション(User:Qa = 1:N)
    public function user(){
        return $this->belongsTo('App\User');
    }
}
