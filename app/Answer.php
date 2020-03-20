<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    protected $table = 'answers';

    // 回答:質問 = N:1
    public function question(){
        return $this->belongsTo('App\Question');
    }

    // 回答:ユーザー = N:1
    public function user(){
        return $this->belongsTo('App\User');
    }

}
