<?php
namespace App\Services;
use App\User;
use App\UserNotification as Model;

class UserNotification
{
    /**
     * テキストからユーザーを調べ、お知らせを追加する
     *
     * @param integer $question_id
     * @param string $text
     * @return void
     */
    public static function addNotification(int $question_id, string $text) {
        $users = self::getUsersIdByText($text);
        foreach($users as $user) {
            $model = new Model;
            $model->insert($user->id, $question_id);
        }
    }

    /**
     * テキストから有効なユーザーを探し返却する
     *
     * @param string $text
     * @return array
     */
    protected static function getUsersIdByText(string $text) : array {
        $users = [];
        $twitter_ids = self::searchTwitterIdByText($text);
        foreach($twitter_ids as $twitter_id) {
            $user = User::where('twitter_id', $twitter_id)->first();
            if ($user) {
                $users[] = $user;
            }
        }
        return $users;
    }

    /**
     * テキストからIDを検索し、返却する
     * @の前の文字が「存在しない」「改行」「空白(半角、全角)」時にIDと判定し
     * 「文字列の終わり」「改行」「空白(半角、全角)」までをIDの区切りと判定を行う
     *
     * @param string $text
     * @return array
     */
    protected static function searchTwitterIdByText(string $text) : array {
        // TwitterIDの最中かどうか
        $flag = '0';
        $id = '';
        $ids = [];
        $array = mb_str_split($text);
        foreach($array as $key => $value) {
            // 文字列のはじめか、@の前の文字が改行、スペースだったらTwitterIDの開始
            if ($flag === '0' && $value === '@') {
                if ($key === 0) {
                    $flag = '1';
                }
                if ( $key !== 0 && in_array( $array[$key-1], ["\n", ' ', '　'] ) ) {
                    $flag = '1';
                }
            } else {
                if ( $key !== 0 && in_array( $value, ["\n", ' ', '　'] ) ) {
                    if ($flag === '1') {
                        if ($id) {
                            $ids[] = $id;
                            $id = '';
                        }
                        $flag = '0';
                    }
                } else {
                    if ($flag === '1') {
                        $id.= $value;
                    }
                }
            }
        }
        if ($id) {
            $ids[] = $id;
        }
        return $ids;
    }
}