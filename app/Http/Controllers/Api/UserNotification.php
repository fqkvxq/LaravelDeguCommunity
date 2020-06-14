<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\UserNotification as Model;
use Auth;

use Illuminate\Http\Request;

class UserNotification extends Controller
{
    /**
     * ユーザーの未読お知らせを全て既読にするAPIエンドポイント
     *
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function read()
    {
        $user_id = Auth::id();
        $datas = Model::where('user_id', $user_id)
                ->where('read', 0)
                ->get();
        foreach($datas as $data) {
            $data->read = 1;
            $data->save();
        }

        return response()->json([], 200, ['Content-Type' => 'application/json']);
    }
}
