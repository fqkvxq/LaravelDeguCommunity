<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degu extends Model
{
    //
    protected $table = 'degus';

    // Userモデルとのリレーション(User:Degu = 1:N)
    public function user(){
        return $this->belongsTo('App\User');
    }
}
