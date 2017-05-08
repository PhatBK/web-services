<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuaHangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CuaHang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->string('ten_khong_dau');
            $table->text('gioi_thieu');
            $table->string('link');
            $table->string('vi_chi');
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
        Schema::drop('CuaHang');
    }
}
