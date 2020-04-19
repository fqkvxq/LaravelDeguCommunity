<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_no','category','question_id'];
    
    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
