<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDegusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('degus', function (Blueprint $table) {
            $table->bigIncrements('id'); //デグー情報のID
            $table->string('name'); //デグーの名前
            $table->string('sex'); //デグーの性別
            $table->string('profile_message'); //デグーのプロフィール文章
            $table->string('photo_url')->nullable(); //デグーの画像URL
            $table->integer('owner_id'); //飼い主固有のID(ログインしているユーザーIDと紐付け)
            $table->string('owner_name'); //飼い主の名前(表示用)
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
        Schema::dropIfExists('degus');
    }
}
