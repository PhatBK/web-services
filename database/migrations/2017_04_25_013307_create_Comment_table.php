<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Comment', function (Blueprint $table) {

            $table->increments('id');
            $table->string('NoiDung');
            $table->integer('DanhGia');

            $table->integer('id_User')->unsigned();
            $table->foreign('id_User')->references('id')->on('Users')->onDelete('cascade');

            $table->integer('id_MonAn')->unsigned();
            $table->foreign('id_MonAN')->references('id')->on('MonAn')->onDelete('cascade');
            
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
        Schema::dropIfExists('Comment');
    }
}
