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

    // 質問:カテゴリー = N:1
    public function categories(){
        return $this->belongsTo('App\Category');
    }

    // 質問:ユーザー = N:1
    public function user(){
        return $this->belongsTo('App\User');
    }

}
