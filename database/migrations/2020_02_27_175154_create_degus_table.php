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
            $table->bigIncrements('id');
            $table->string('degu_name');
            $table->string('degu_sex');
            $table->integer('degu_photo_id')->nullable();
            $table->string('degu_profile');

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
