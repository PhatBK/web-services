<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    //
    protected $table='theloai';
    public function loaimon(){
    	return $this->hasMany('App\LoaiMon','id_TheLoai','id');
    }
    public function monan(){
    	return $this->hasManyThrough('App\MonAn','App\LoaiMon','id_TheLoai','id_LoaiMon','id');
    }
}
