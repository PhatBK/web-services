<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoaiMonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LoaiMon', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('ten');
            $table->string('ten_khong_dau');

            $table->integer('id_TheLoai')->unsigned();
            $table->foreign('id_TheLoai')->references('id')->on('TheLoai')->onDelete('cascade');

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
        Schema::dropIfExists('LoaiMon');
    }
}
