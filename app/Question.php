<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $table = 'questions';

    // 質問:回答=1:N
    public function answers(){
        return $this->hasMany('App\Answer');
    }

    // 質問:ユーザー = N:1
    public function user(){
        return $this->belongsTo('App\User');
    }

    //質問：カテゴリー＝1:1
    public function category(){
        return $this->hasOne('App\Category');
    }

}
