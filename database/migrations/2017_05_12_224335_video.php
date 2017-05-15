<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Video extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('video',function(Blueprint $table){
            $table->increments('id');
            $table->string('link',100);
            $table->integer('id_monan')->unsigned();
            $table->foreign('id_monan')->references('id')->on('monan');
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
        //
        Schema::drop('video');
    }
}
