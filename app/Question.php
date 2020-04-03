<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $table = 'questions';
    protected $fillable = ['answer_flg'];

    // 質問:回答=1:N
    public function answers(){
        return $this->hasMany('App\Answer');
    }

    // 質問:ユーザー = N:1
    public function user(){
        return $this->belongsTo('App\User');
    }

}
