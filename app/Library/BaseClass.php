<?php
namespace app\Library;

use Illuminate\Support\HtmlString;

class BaseClass
{
    /**
     * 文字列の中からURLを探し、リンクに変換する
     *
     * @param string $text
     * @return string
     */
    public static function eReplaceUrl($text) {
        // 事前にescape
        $text = e($text);

        $pattern = '/((?:https?|ftp):\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+)/';
        $replace = '<a href="$1" target="_blank">$1</a>';
        $text    = preg_replace($pattern, $replace, $text);
        return new HtmlString($text);
    }
}