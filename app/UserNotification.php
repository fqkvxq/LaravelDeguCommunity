<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserNotification extends Model
{
    public function insert($user_id, $question_id) {
        $this->user_id = $user_id;
        $this->text = '<a href="'.url('qa').'/'.$question_id.'">この書き込みで</a>お知らせがあります';
        $this->save();
    }
}