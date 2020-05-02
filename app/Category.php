<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // カテゴリー：質問=1:N
    public function question(){
        $this->hasMany('App\Question');
    }
}
