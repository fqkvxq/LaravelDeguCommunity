<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    // カテゴリー:質問 = 1:N
    public function questions(){
        return $this->hasMany('App\Question');
    }
}
