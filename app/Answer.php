<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;
use App\Question;

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

    /**
     * テキストを表示する際に使用
     * 1.textをエスケープ
     * 2.URLを外部リンク化
     * 3.#xxを内部リンク化
     *
     * 内部リンクとして判別するのは「(行頭又は半角スペース又は改行又は開始括弧)の次に【#数値】の次に(行末又は半角スペース又は改行又は閉じ括弧)」となっている文字
     * 存在しないIDについてはリンクとしない
     *
     * @return HtmlString
     */
    public function displayText() {
        $text = $this->text;

        // 1.テキストエスケープ
        $text = e($text);
        // 2.URLをリンク化
        $text = \App\Library\BaseClass::eReplaceUrl($this->text);
        $text = $text->toHtml();
        // #xxを内部リンク化
        $text = preg_replace_callback( '/(^|\n|\s|\()#[0-9]+(\n|\s|$|\))/', function($match){
            $id = $match[0];
            // 検索用IDから改行、空白を削除
            $find_id = trim($id);
            // 検索用IDから(、#を削除
            $find_id = ltrim($find_id, '(#');
            // 検索用IDから)を削除
            $find_id = rtrim($find_id, ')');
            if (Question::find($find_id)) {
                // 存在する質問のIDの場合、【#数値】にリンクをつける
                $id = preg_replace('/#[0-9]+/', '<a href="'.url('qa/'.$find_id).'">$0</a>', $id);
            }
            return $id;
        }, $text);

        return new HtmlString($text);
    }
}
