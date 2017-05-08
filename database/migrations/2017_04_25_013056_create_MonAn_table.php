<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonAnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MonAn', function (Blueprint $table) {

            $table->increments('id');
            $table->string('TieuDe');
            $table->string('TieuDeKhongDau');
            $table->string('TenMon');
            $table->text('TomTat');
            $table->longText('NoiDung');
            $table->string('Hinh');
            $table->text('Chu_Y');

            $table->integer('NoiBat')->default(0);
            $table->integer('SoLuotXem')->default(0);

            $table->integer('id_LoaiMon')->unsigned();
            $table->foreign('id_LoaiMon')->references('id')->on('LoaiMon')->onDelete('cascade');

            $table->integer('id_VungMien')->unsigned();
            $table->foreign('id_VungMien')->references('id')->on('VungMien')->onDelete('cascade');
            
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
        Schema::dropIfExists('MonAn');
    }
}
