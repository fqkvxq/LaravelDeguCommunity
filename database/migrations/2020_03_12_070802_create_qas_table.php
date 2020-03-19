<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qas', function (Blueprint $table) {
            $table->bigIncrements('id'); //質問固有のID
            $table->integer('user_id');//投稿者固有ID
            $table->string('question_text'); //質問本文
            $table->integer('answer_flg');// 回答フラグ(回答があれば1,なければ0)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qas');
    }
}
