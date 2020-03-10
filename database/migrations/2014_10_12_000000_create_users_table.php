<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id'); //固有のID
            $table->string('name')->nullable(); //ユーザー名(あとから変更可能)
            $table->string('twitter_id')->nullable(); //TwitterID
            $table->string('profile_image_url')->nullable(); //飼い主プロフィール画像
            $table->string('email')->unique()->nullable(); //メールアドレス
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
