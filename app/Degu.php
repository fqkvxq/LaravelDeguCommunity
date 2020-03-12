<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degu extends Model
{
    //
    protected $table = 'degus';

    public function user(){
        return $this->belongsTo('App\User');
    }
}
